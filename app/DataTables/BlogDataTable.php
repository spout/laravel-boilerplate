<?php

namespace App\DataTables;

use App\Models\Post;

class BlogDataTable extends DataTable
{
    protected static $model = Post::class;
    protected static $resourcePrefix = 'admin.blog';

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
            'created_at',
            'updated_at',
        ];
    }
}
