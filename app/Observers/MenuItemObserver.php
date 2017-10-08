<?php
namespace App\Observers;

use App\Models\MenuItem;

class MenuItemObserver
{
    public function saving(MenuItem $menuItem)
    {
        if (strpos($menuItem->association, '.') !== false) {
            list($menuItem->model, $menuItem->foreign_key) = explode('.', $menuItem->association);
            if (empty($menuItem->title)) {
                $modelClass = $menuItem->model;
                $row = $modelClass::find($menuItem->foreign_key);
                $menuItem->title = $row->title;
            }
        }
        unset($menuItem->association);

        if (empty($menuItem->title) && empty($menuItem->model) && empty($menuItem->foreign_key) && empty($menuItem->url) && empty($menuItem->route)) {
            return false;
        }
    }
}