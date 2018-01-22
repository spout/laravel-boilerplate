<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

class RoutesController extends AdminController
{
    public function index()
    {
        $routes = Route::getRoutes();
        return view('admin.routes.index', compact('routes'));
    }
}