<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Models\User;

class UsersController extends AdminController
{
    protected static $model = User::class;
    protected static $dataTableClass = UsersDataTable::class;
}