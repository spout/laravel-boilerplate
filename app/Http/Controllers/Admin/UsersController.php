<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Traits\DatatablesTrait;

class UsersController extends AdminController
{
    use DatatablesTrait;

    protected static $model = User::class;
    protected static $resourcePrefix = 'admin.users';
}