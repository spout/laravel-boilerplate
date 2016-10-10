<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;

class UsersController extends AdminController
{
    public $model = User::class;
}