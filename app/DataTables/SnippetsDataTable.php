<?php

namespace App\DataTables;

use App\Models\Snippet;

class SnippetsDataTable extends DataTable
{
    protected static $model = Snippet::class;
    protected static $resourcePrefix = 'admin.snippets';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'component', 'name' => 'component', 'title' => _i("Component")],
        ];
    }
}
