<?php

namespace App\Http\Controllers\Advertiser;

class DashboardController extends AdvertiserController
{
    public function index()
    {
        return view('advertiser.dashboard.index');
    }
}