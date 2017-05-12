<?php
namespace App\Observers;

use App\Models\MenuItem;

class MenuItemObserver
{
    public function saving(MenuItem $menuItem)
    {
        if (strpos($menuItem->association, '.') !== false) {
            list($menuItem->model, $menuItem->foreign_key) = explode('.', $menuItem->association);
        }
        unset($menuItem->association);

        if (!empty($menuItem->delete)) {
            $menuItem->delete();
            return false;
        }

        if (empty($menuItem->model) && empty($menuItem->foreign_key) && empty($menuItem->url) && empty($menuItem->route)) {
            return false;
        }
    }
}