<?php
namespace App\Http\Controllers\Admin;

use App\Models\Config;

class ConfigsController extends AdminController
{
    public $model = Config::class;
}