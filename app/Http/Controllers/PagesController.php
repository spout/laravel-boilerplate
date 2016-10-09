<?php
namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function show($slug = 'index')
    {
        return view(sprintf('pages.%s', $slug))->with('slug', $slug);
    }
}