<?php
namespace App\Http\Controllers\Admin;

class SettingsController extends AdminController
{
    public function index()
    {
        return view('admin.settings.index');
    }
}