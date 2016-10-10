<?php
namespace App\Http\Controllers;

use App\Models\Contact;

class ContentsController extends Controller
{
    public $model = Contact::class;

    public function show($slug)
    {
        $content = Content::where('slug', $slug)->first();
        return view('contents.show', compact('content'));
    }
}