<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Models\User;

class UsersController extends AdminController
{
    public static $model = User::class;
    public static $dataTableClass = UsersDataTable::class;
}