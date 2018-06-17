<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        $navbar = 'foobar';

        $view->with(compact('navbar'));
    }
}