<?php
namespace App\Providers\Directives;

use App\Models\Menu;
use Symfony\Component\Yaml\Yaml;

class MenuDirective
{
    public static function display($expression)
    {
        $menu = Menu::where('slug', $expression['menu'])->first();

        foreach ($menu->menuItems()->orderBy('sort', 'asc') ?:[] as &$item) {
            if (!empty($item->model) && !empty($item->foreign_key)) {
                $modelClass = $item->model;
                $row = $modelClass::find($item->foreign_key);
                $item->url = $row->absoluteUrl;
                if (empty($item->title)) {
                    $item->title = $row; // __toString()
                }
            } elseif (!empty($item->route)) {
                $route = Yaml::parse($item->route);
                $item->url = route($route['name'], $route['parameters']);
            }
        }

        $view = isset($expression['view']) ? $expression['view'] : 'menus.display';
        return view($view, compact('menu'));
    }
}