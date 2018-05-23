<?php

namespace App\Http\ViewComposers;

use App\Models\Form;
use Illuminate\View\View;

class FormListComposer
{
    public function compose(View $view)
    {
        $formList = Form::all()->pluck('title', 'id')->prepend('-', '');
        $view->with(compact('formList'));
    }
}