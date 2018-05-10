<?php

namespace App\Http\ViewComposers;

use App\Models\Module;
use Illuminate\View\View;

class ModuleListComposer
{
    public function compose(View $view)
    {
        $locale = \LaravelLocalization::getCurrentLocale();
        $view->with('moduleList', Module::all()->pluck("title_{$locale}", 'slug')->prepend('-', ''));
    }
}