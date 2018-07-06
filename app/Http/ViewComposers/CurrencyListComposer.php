<?php

namespace App\Http\ViewComposers;

use App\Models\Currency;
use Illuminate\View\View;

class CurrencyListComposer
{
    public function compose(View $view)
    {
        $currencyList = Currency::all()->pluck('name', 'code');
        $view->with(compact('currencyList'));
    }
}