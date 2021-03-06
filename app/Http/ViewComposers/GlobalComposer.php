<?php

namespace App\Http\ViewComposers;

use App\Models\Currency;
use App\Models\MenuItem;
use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        if (php_sapi_name() !== 'cli') {
            $menuPrincipal = MenuItem::whereHas('menu', function ($query) {
                    $query->where('slug', 'principal');
                })
                ->get()
                ->buildTree();
            $view->with(compact('menuPrincipal'));

            $currencies = Currency::all();
            $view->with(compact('currencies'));
        }
    }
}