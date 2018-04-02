<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class CurrentSiteComposer
{
    public function compose(View $view)
    {
        $view->with('currentSite', config('currentSite'));
    }
}