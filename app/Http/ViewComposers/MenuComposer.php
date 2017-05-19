<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MenuItem;

class MenuComposer
{
    public function compose(View $view)
    {
        $view->with('parentList', MenuItem::where('menu_id', $view->object->id)->get()->pluck('title', 'id')->prepend('-', ''));
    }
}