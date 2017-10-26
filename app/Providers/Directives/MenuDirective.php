<?php
namespace App\Providers\Directives;

use App\Models\Menu;

class MenuDirective
{
    public static function display($expression)
    {
        $menu = Menu::where('slug', $expression['slug'])->first();
        return view($expression['view'] ?? 'menus.display', compact('menu'));
    }
}