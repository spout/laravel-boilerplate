<?php
namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function show($path = 'index')
    {
        return view("pages.$path", compact('path'));
    }
}