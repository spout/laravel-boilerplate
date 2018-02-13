<?php

namespace App\DataTables;

use App\Models\Site;

class SitesDataTable extends DataTable
{
    protected static $model = Site::class;
    protected static $resourcePrefix = 'admin.sites';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'domain', 'name' => 'domain', 'title' => _i("Domain")],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
