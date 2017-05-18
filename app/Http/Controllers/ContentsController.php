<?php
namespace App\Http\Controllers;

use App\Models\Content;

class ContentsController extends Controller
{
    protected static $model = Content::class;

    public function show($path)
    {
        $content = Content::locale('path', $path)->firstOrFail();
        return view('contents.show', compact('content'));
    }
}