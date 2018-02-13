<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Advert;
use App\Models\Module;

class AdvertsController extends AdvertiserController
{
    protected static $model = Advert::class;

    public function index($slug = null)
    {
        $modules = Module::all();

        return view('advertiser.adverts.index', compact('modules', 'slug'));
    }
}