<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crud\CrudTrait;

class AdminController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }
}