<?php

namespace App\Http\Controllers\Admin;

class FileManagerController extends AdminController
{
    public function index()
    {
        return view('admin.file-manager.index');
    }
}