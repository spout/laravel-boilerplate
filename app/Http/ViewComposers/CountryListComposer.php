<?php

namespace App\Http\ViewComposers;

use App\Models\Country;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountryListComposer
{
    public function compose(View $view)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $view->with('countryList', Country::all()->pluck("name_{$locale}", 'code')->prepend('-', ''));
    }
}