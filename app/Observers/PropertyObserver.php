<?php
namespace App\Observers;

use App\Libraries\GoogleCalendar;
use App\Models\EventTemplate;
use App\Models\EventType;
use App\Models\Property;
use App\Models\Booking;
use Carbon\Carbon;

class PropertyObserver
{
    public function saved(Property $property)
    {
        $expectedDescriptionDatas = [
            'nights' => '/NIGHTS:\s(?P<nights>\d+)\n/',
            'phone' => '/PHONE:\s(?P<phone>\+[0-9\s]+)\n/',
            'email' => '/EMAIL:\s(?P<email>[0-9a-zA-Z-\.@]+)\n/',
        ];

        $googleCalendar = new GoogleCalendar();
        $events = [];

        foreach ($property->icalUrlAsObject->VEVENT as $vevent) {
            if (trim($vevent->summary) !== 'Not available') {
                $booking = new Booking();
                $booking->property_id = $property->id;

                /**
                 * Name extraction from pattern like this:
                 * Yann Saint Pierre (4Q2PTN)
                 */
                if (preg_match('/(?P<name>.+)\s\([A-Z0-9]+\)/', $vevent->summary, $matches)) {
                    $booking->name = $matches['name'];
                } else {
                    $booking->name = $vevent->summary;
                }

                $booking->arrival_date = \DateTime::createFromFormat('Ymd', $vevent->DTSTART);
                $booking->departure_date = \DateTime::createFromFormat('Ymd', $vevent->DTEND);
                $booking->property_name = $vevent->location;

                foreach ($expectedDescriptionDatas as $col => $pattern) {
                    if (preg_match($pattern, $vevent->DESCRIPTION, $matches)) {
                        $booking->{$col} = $matches[$col];
                    }
                }

                $booking->save();

                $eventTemplates = EventTemplate::all();

                foreach ($eventTemplates as $eventTemplate) {
                    $insertEvent = false;
                    $summary = $eventTemplate->summary;
                    $location = $property->address;
                    $description = $eventTemplate->template;
                    $start = Carbon::create();
                    $end = Carbon::create();
                    $timeStart = $eventTemplate->time_start;
                    $timeEnd = $eventTemplate->time_end;
                    $timeModify = $eventTemplate->time_modify;
                    $colorId = $eventTemplate->color;
                    $arrivalDate = $booking->arrival_date;
                    $departureDate = $booking->departure_date;

                    $search = [];
                    $replace = [];
                    foreach (config('templates-tags') as $tag => $label) {
                        list($entity, $attribute) = explode('.', $tag);
                        $search[] = "[$tag]";
                        $replace[] = ${$entity}->{$attribute};
                    }

                    $summary = str_replace($search, $replace, $summary);
                    $description = str_replace($search, $replace, $description);

                    list($startHour, $startMinute,) = explode(':', $timeStart);
                    list($endHour, $endMinute,) = explode(':', $timeEnd);

                    switch ($eventTemplate->type) {
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
            }
        }

        $googleCalendar->insertBatch($events);
    }
}