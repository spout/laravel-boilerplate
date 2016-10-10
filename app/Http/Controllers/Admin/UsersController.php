<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;

class UsersController extends AdminController
{
    protected static $model = User::class;
}