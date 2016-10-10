<?php
namespace App\Http\Controllers;

use App\Models\Content;

class ContentsController extends Controller
{
    protected static $model = Content::class;

    public function show($slug)
    {
        $content = Content::where('slug', $slug)->first();
        return view('contents.show', compact('content'));
    }
}