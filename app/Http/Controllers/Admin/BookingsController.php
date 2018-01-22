<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;

class BookingsController extends AdminController
{
    protected static $model = Booking::class;
}