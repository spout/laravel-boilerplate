<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MenuItem;

class MenuComposer
{
    public function compose(View $view)
    {
        $menuItems = MenuItem::where('menu_id', $view->object->id)->get();
        $parentList = $menuItems->pluck('title', 'id')->prepend('-', '');
        $view->with(compact('parentList'));
    }
}