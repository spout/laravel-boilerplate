<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Content;

class ContentComposer
{
    public function compose(View $view)
    {
        $view->with('contentList', Content::where('id', '!=', $view->object->id)->get()->pluck('title', 'id')->prepend('-', ''));
    }
}