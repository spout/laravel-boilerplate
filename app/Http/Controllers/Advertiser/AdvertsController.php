<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Product;
use App\Models\Module;

class ProductsController extends AdvertiserController
{
    protected static $model = Product::class;

    public function index($slug = null)
    {
        $modules = Module::all();

        return view('advertiser.products.index', compact('modules', 'slug'));
    }
}