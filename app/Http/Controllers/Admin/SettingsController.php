<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SettingsDataTable;
use App\Models\Setting;

class SettingsController extends AdminController
{
    public static $model = Setting::class;
    public static $dataTableClass = SettingsDataTable::class;
}