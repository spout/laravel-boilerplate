<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Config;

class CurrentSiteComposer
{
    public function compose(View $view)
    {
        $view->with('currentSite', Config::get('currentSite'));
    }
}