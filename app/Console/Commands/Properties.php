<?php

namespace App\Console\Commands;

use App\Libraries\GoogleCalendar;
use App\Mail\PropertiesNotificationSend;
use App\Models\Booking;
use App\Models\Email;
use App\Models\EmailTemplate;
use App\Models\EmailType;
use App\Models\Event;
use App\Models\EventTemplate;
use App\Models\EventType;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Properties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse iCal, create bookings, create events, send emails';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $properties = Property::all();
        $eventTypes = EventType::all();
        $emailTypes = EmailType::all();

        $googleCalendar = new GoogleCalendar();
        $events = [];
        $expectedDescriptionDatas = [
            'nights' => '/NIGHTS:\s(?P<nights>\d+)\n/',
            'phone' => '/PHONE:\s(?P<phone>\+[0-9\s]+)\n/',
            'email' => '/EMAIL:\s(?P<email>[0-9a-zA-Z-\.@]+)\n/',
        ];
        $now = Carbon::now();

        /**
         * Iterate over properties to parse iCal and create corresponding bookings and Google Calendar events
         */
        foreach ($properties as $property) {
            foreach ($property->icalUrlAsObject->VEVENT as $vevent) {
                $arrivalDate = Carbon::createFromFormat('Ymd', $vevent->DTSTART);
                $departureDate = Carbon::createFromFormat('Ymd', $vevent->DTEND);
                $arrivalDateDisplay = $arrivalDate->format('d/m/Y');
                $departureDateDisplay = $departureDate->format('d/m/Y');

                /**
                 * Check if booking is expired
                 */
                if ($departureDate >= $now) {
                    /**
                     * Name extraction from pattern like this:
                     * Yann Saint Pierre (4Q2PTN)
                     */
                    if (preg_match('/(?P<name>.+)\s\((?P<ref>[A-Z0-9]+)\)/', $vevent->summary, $matches)) {
                        $name = $matches['name'];
                        $ref  = $matches['ref'];

                        $booking = Booking::firstOrNew(['ref' => $ref]);

                        $verb = $booking->exists ? _i("Updating") : _i("Creating");
                        $this->info("$verb: $ref: $arrivalDateDisplay -> $departureDateDisplay");

                        $booking->property_id = $property->id;
                        $booking->name = $name;
                        $booking->arrival_date = $arrivalDate;
                        $booking->departure_date = $departureDate;
                        $booking->property_name  = $vevent->location;

                        foreach ($expectedDescriptionDatas as $col => $pattern) {
                            if (preg_match($pattern, $vevent->DESCRIPTION, $matches)) {
                                $booking->{$col} = $matches[$col];
                            }
                        }

                        $booking->save();

                        foreach ($eventTypes as $eventType) {
                            $insertEvent = false;
                            $summary = $eventType->eventTemplate['summary'];
                            $location = $property->address;
                            $description = $eventType->eventTemplate['template'];
                            $start = Carbon::create();
                            $end = Carbon::create();
                            $timeStart = $eventType->eventTemplate['time_start'];
                            $timeEnd = $eventType->eventTemplate['time_end'];
                            $timeModify = $eventType->eventTemplate['time_modify'];
                            $colorId = $eventType->eventTemplate['color'];

                            $summary = templates_tags_replace($booking, $summary);
                            $description = templates_tags_replace($booking, $description);

                            list($startHour, $startMinute,) = explode(':', $timeStart);
                            list($endHour, $endMinute,) = explode(':', $timeEnd);

                            switch ($eventType->type) {
                                case 'arrival':
                                    if (!empty($property->check_in)) {
                                        $insertEvent = true;
                                        $start = $arrivalDate->setTime($startHour, $startMinute);
                                        $end = $arrivalDate->setTime($endHour, $endMinute);
                                    }
                                    break;

                                case 'departure':
                                    if (!empty($property->check_out)) {
                                        $insertEvent = true;
                                        $start = $departureDate->setTime($startHour, $startMinute);
                                        $end = $departureDate->setTime($endHour, $endMinute);
                                    }
                                    break;

                                case 'household':
                                    $insertEvent = true;
                                    $start = $departureDate->setTime($startHour, $startMinute);
                                    $end = $departureDate->setTime($endHour + $property->household_hours, $endMinute);
                                    break;
                            }

                            if (!empty($timeModify)) {
                                $start->modify($timeModify);
                                $end->modify($timeModify);
                            }

                            if ($insertEvent === true) {
                                $events[] = [
                                    'summary' => $summary,
                                    'location' => $location,
                                    'description' => $description,
                                    'start' => $start,
                                    'end' => $end,
                                    'colorId' => $colorId,
                                    'reminders' => ['useDefault' => true],
                                    'extendedProperties' => ['private' => ['event_type' => $eventType->type, 'booking_id' => $booking->id]],
                                ];
                            }
                        }
                    } elseif (trim($vevent->summary) !== 'Not available') {
                        $this->warn(_i("Skipping not available: %s -> %s", $arrivalDateDisplay, $departureDateDisplay));

                        /**
                         * For bookings day - 3
                         * Send notification email
                         */
                        if (Carbon::now()->addDays(3)->lt($arrivalDate)) {
                            $sentEmails = Email::where('property_id', $property->id)->where('email_type', EmailType::NOT_AVAILABLE)->get();

                            if ($sentEmails->count() === 0) {
                                $emailType = EmailType::find(EmailType::NOT_AVAILABLE);

                                $to = templates_tags_replace($property, $emailType->emailTemplate['to']);
                                $subject = templates_tags_replace($property, $emailType->emailTemplate['subject']);
                                $message = templates_tags_replace($property, $emailType->emailTemplate['template']);

                                $email = Email::create([
                                    'property_id' => $property->id,
                                    'booking_id' => null,
                                    'email_type' => EmailType::NOT_AVAILABLE,
                                    'to' => $to,
                                    'subject' => $subject,
                                    'message' => $message,
                                ]);
                                Mail::send(new PropertiesNotificationSend($email));
                            }
                        }
                    } else {
                        $this->warn(_i("Skipping booking without ref or not available"));
                    }
                }
            }
        }

        $this->info(_i("Inserting Google Calendar events"));
        $googleCalendarEvents = $googleCalendar->insertBatch($events);

        foreach ($googleCalendarEvents as $googleCalendarEvent) {
            /** @var \Google_Service_Calendar_Event $googleCalendarEvent */
            $extendedProperties = $googleCalendarEvent->getExtendedProperties();
            Event::firstOrCreate([
                'id' => $googleCalendarEvent->getId(),
            ], [
                'event_type' => $extendedProperties['private']['event_type'],
                'booking_id' => $extendedProperties['private']['booking_id'],
                'summary' => $googleCalendarEvent->getSummary(),
                'location' => $googleCalendarEvent->getLocation(),
                'description' => $googleCalendarEvent->getDescription(),
                'start' => Carbon::createFromFormat(Carbon::RFC3339, $googleCalendarEvent->getStart()->getDateTime()),
                'end' => Carbon::createFromFormat(Carbon::RFC3339, $googleCalendarEvent->getEnd()->getDateTime()),
                'html_link' => $googleCalendarEvent->getHtmlLink(),
            ]);
        }

        /**
         * Iterate over bookings to send notification emails
         */
        $bookings = Booking::where('departure_date', '<=', Carbon::now())->get();

        foreach ($bookings as $booking) {
            foreach ($emailTypes as $emailType) {
                /** @var Carbon $arrivalDate */
                $arrivalDate = $booking->arrival_date->copy();
                /** @var Carbon $departureDate */
                $departureDate = $booking->departure_date->copy();
                $send = false;

                /**
                 * Can be done via relationships conditions but missing time
                 */
                $sentEmails = Email::where('booking_id', $booking->id)->where('email_type', $emailType->type)->get();

                if ($sentEmails->count() === 0) {
                    switch ($emailType->type) {
                        case 'traveler':
                            // 7 days before arrival
                            $send = $arrivalDate->subDays(7)->lte($now) && $departureDate->gt($now);
                            break;

                        case 'owner':
                            // immediately
                            $send = $departureDate->gt($now);
                            break;

                        case 'concierge':
                            // at departure date
                            $send = $departureDate->diffInDays($now) === 0;
                            break;
                    }

                    if ($send === true) {
                        $to = templates_tags_replace($booking, $emailType->emailTemplate['to']);
                        $subject = templates_tags_replace($booking, $emailType->emailTemplate['subject']);
                        $message = templates_tags_replace($booking, $emailType->emailTemplate['template']);

                        $email = Email::create([
                            'property_id' => $booking->property['id'],
                            'booking_id' => $booking->id,
                            'email_type' => $emailType->type,
                            'to' => $to,
                            'subject' => $subject,
                            'message' => $message,
                        ]);

                        Mail::send(new PropertiesNotificationSend($email));
                    }
                }
            }
        }

        return true;
    }
}
