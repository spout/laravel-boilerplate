<?php
namespace App\Providers\Directives;

use App\Models\Menu;

class MenuDirective
{
    public static function display($expression)
    {
        $menu = Menu::where('slug', $expression['slug'])->first();
        $menu->attributes = json_decode($menu->attributes, true);

        foreach ($menu->menuItems ?:[] as &$item) {
            if (!empty($item->model_class) && !empty($item->foreign_key)) {
                $modelClass = $item->model_class;
                $row = $modelClass::find($item->foreign_key);
                if (!empty($row)) {
                    $item->url = $row->absoluteUrl;
                    if (empty($item->title)) {
                        $item->title = $row; // __toString()
                    }
                }
            } elseif (!empty($item->route)) {
                $route = json_decode($item->route, true);
                $item->url = route($route['name'], empty($route['parameters']) ? [] : $route['parameters']);
            }
        }

        $view = isset($expression['view']) ? $expression['view'] : 'menus.display';
        return view($view, compact('menu'));
    }
}