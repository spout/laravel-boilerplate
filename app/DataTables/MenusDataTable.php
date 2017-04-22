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
            ['data' => 'id', 'name' => 'id', 'title' => __("ID")],
            ['data' => 'title', 'name' => 'title', 'title' => __("Title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => __("Slug")],
        ];
    }
}
