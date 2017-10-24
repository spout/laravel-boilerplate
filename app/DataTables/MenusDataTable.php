<?php

namespace App\DataTables;

use App\Models\Menu;

class MenusDataTable extends DataTable
{
    protected static $model = Menu::class;
    protected static $resourcePrefix = 'admin.menus';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
        ];
    }
}
