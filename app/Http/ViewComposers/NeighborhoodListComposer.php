<?php

namespace App\Http\ViewComposers;

use App\Models\Neighborhood;
use Illuminate\View\View;

class NeighborhoodListComposer
{
    public function compose(View $view)
    {
        $neighborhoodList = Neighborhood::all()->pluck('name', 'id')->prepend('-', '');
        $view->with(compact('neighborhoodList'));
    }
}