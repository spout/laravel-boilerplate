<?php
namespace App\Http\Controllers;

use App\Models\Content;

class ContentsController extends Controller
{
    protected static $model = Content::class;

    public function show($slug)
    {
        $content = Content::locale('slug', $slug)->firstOrFail();
        return view('contents.show', compact('content'));
    }
}