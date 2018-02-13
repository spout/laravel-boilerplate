<?php

namespace App\DataTables;

use App\Models\Gallery;

class GalleriesDataTable extends DataTable
{
    protected static $model = Gallery::class;
    protected static $resourcePrefix = 'admin.galleries';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
