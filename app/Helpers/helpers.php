<?php

if (!function_exists('templates_tags_replace')) {
    function templates_tags_replace(\App\Models\Booking $booking, $subject)
    {
        $search  = [];
        $replace = [];
        foreach (config('templates-tags') as $tag => $label) {
            list($entity, $attribute) = explode('.', $tag);
            $search[] = "[$tag]";

            switch ($entity) {
                case 'booking':
                    $replace[] = $booking->{$attribute};
                    break;

                case 'property':
                    $replace[] = $booking->property[$attribute];
                    break;
            }
        }

        return str_replace($search, $replace, $subject);
    }
}