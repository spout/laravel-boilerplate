<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SettingsDataTable;
use App\Models\Setting;

class SettingsController extends AdminController
{
    protected static $model = Setting::class;
    protected static $dataTableClass = SettingsDataTable::class;
}