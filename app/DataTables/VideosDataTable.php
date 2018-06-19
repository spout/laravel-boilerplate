<?php

namespace App\DataTables;

class VideosDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => _i("Id"), 'searchable' => false],
            ['data' => 'url', 'name' => 'url', 'title' => _i("URL")],
        ];
    }

    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('url', function ($object) {
            return '<a href="' . $object->url . '" target="_blank">' . $object->url . '</a>';
        });
        $dataTable->rawColumns(['action', 'url']);
        return $dataTable;
    }
}
