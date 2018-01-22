<?php

namespace App\Observers;

use App\Libraries\GoogleCalendar;
use App\Models\Booking;

class BookingObserver
{
    public function deleting(Booking $booking)
    {
        $googleCalendar = new GoogleCalendar();

        foreach ($booking->events as $event) {
            try {
                $googleCalendar->delete($event['id']);
            } catch (\Google_Service_Exception $e) {
                // Event deleted via Google Calendar interface
            }
        }
    }
}