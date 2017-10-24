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
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'path', 'name' => 'path', 'title' => _i("Path")],
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
