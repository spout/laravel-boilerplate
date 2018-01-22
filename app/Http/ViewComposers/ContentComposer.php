<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Content;

class ContentComposer
{
    public function compose(View $view)
    {
        $contentList = Content::where('id', '!=', $view->object->id)
            ->whereNull('parent_id')
            ->get()
            ->pluck('title', 'id')
            ->prepend('-', '');

        $view->with(compact('contentList'));
    }
}