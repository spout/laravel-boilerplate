<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookingsDataTable;
use App\Models\Booking;

class BookingsController extends AdminController
{
    public static $model = Booking::class;
    public static $dataTableClass = BookingsDataTable::class;
    public static $resourcePrefix = 'admin.bookings';
}