<?php

namespace App\Http\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class ProductListComposer
{
    public function compose(View $view)
    {
        $lang = \LaravelLocalization::getCurrentLocale();
        $productList = Product::all()->pluck("title_{$lang}", 'id');
        $view->with(compact('productList'));
    }
}