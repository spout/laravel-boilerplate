<?php

namespace App\Http\ViewComposers;

use App\Models\Template;
use Illuminate\View\View;

class TemplateListComposer
{
    public function compose(View $view)
    {
        $templateList = Template::all()->pluck('slug', 'slug')->prepend('-', '');
        $view->with(compact('templateList'));
    }
}