<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;

abstract class AdvertiserController extends Controller
{
    public function __construct()
    {
        $this->middleware('advertiser');
    }
}