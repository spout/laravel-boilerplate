<?php

namespace App\Http\ViewComposers;

use App\Models\Amenity;
use Illuminate\View\View;

class AmenitiesComposer
{
    public function compose(View $view)
    {
        $view->with('amenities', Amenity::all());
    }
}