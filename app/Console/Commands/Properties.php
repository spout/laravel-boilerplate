<?php

namespace App\Console\Commands;

use App\Libraries\GoogleCalendar;
use App\Mail\PropertiesBookingSend;
use App\Models\Booking;
use App\Models\Email;
use App\Models\EmailType;
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
     *
     * @return void
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
                if (true /*$departureDate >= $now*/) {
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
                                ];
                            }
                        }
                    } elseif (trim($vevent->summary) !== 'Not available') {
                        $this->warn(_i("Skipping not available: %s -> %s", $arrivalDateDisplay, $departureDateDisplay));

                        /**
                         * For bookings day - 3
                         */
                        if (Carbon::now()->addDays(3)->lt($arrivalDate)) {
                            // Send notification mail
                            $email = Email::create([
                                'property_id' => $property->id,
                                //'booking_id' => $booking->id,
                                'email_type' => 'not-available',
                                'to' => '',
                                'subject' => '',
                                'message' => '',
                            ]);
                            Mail::send(new PropertiesBookingSend($email));
                        }
                    } else {
                        $this->warn(_i("Skipping booking not matching patterns"));
                    }
                }
            }
        }

        //$googleCalendar->insertBatch($events);

        /**
         * Iterate over bookings to send notification emails
         */
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            foreach ($emailTypes as $emailType) {
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

                Mail::send(new PropertiesBookingSend($email));
            }
        }

        return true;
    }
}
