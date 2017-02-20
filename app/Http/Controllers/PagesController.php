<?php
namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function show($slug = 'index')
    {
        return view("pages.$slug")->with('slug', $slug);
    }
}