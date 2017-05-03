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
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
