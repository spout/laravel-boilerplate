<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Models\Config;

class ConfigsController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Config::class;
    protected static $resourcePrefix = 'admin.configs';
}