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
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            //['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'path', 'name' => 'path', 'title' => _i("Path")],
            //['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            //['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }

    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('title', function ($object) {
            $ancestors = $object->ancestors;
            $ancestors->push($object);
            return $ancestors->implode('title', ' > ');
        });
        return $dataTable;
    }
}
