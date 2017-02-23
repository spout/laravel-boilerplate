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
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'title', 'title' => __("Title")],
            ['data' => 'slug', 'title' => __("Slug")],
        ];
    }
}