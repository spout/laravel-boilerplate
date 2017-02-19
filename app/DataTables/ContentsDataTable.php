<?php

namespace App\DataTables;

use App\Models\Content;

class ContentsDataTable extends DataTable
{
    protected static $model = Content::class;
    protected static $resourcePrefix = 'admin.contents';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'title',
            'slug',
            'path',
            'created_at',
            'updated_at',
        ];
    }
}
