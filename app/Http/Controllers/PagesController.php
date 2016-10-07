<?php
namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function view($slug)
    {
        return view(sprintf('pages.%s', $slug))->with('slug', $slug);
    }
}