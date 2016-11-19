<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Models\User;

class UsersController extends AdminController
{
    use DatatablesTrait;

    protected static $model = User::class;
    protected static $resourcePrefix = 'admin.users';
}