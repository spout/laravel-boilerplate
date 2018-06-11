<?php

namespace App\Http\ViewComposers;

use App\Models\Region;
use Illuminate\View\View;

class RegionListComposer
{
    public function compose(View $view)
    {
        $regionList = Region::all()->pluck('name', 'id')->prepend('-', '');
        $view->with(compact('regionList'));
    }
}