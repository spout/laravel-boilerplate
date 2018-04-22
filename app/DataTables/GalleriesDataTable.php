<?php

namespace App\DataTables;

class GalleriesDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('shortcode', function ($object) {
            return $object->shortcode;
        });
        return $dataTable;
    }

    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'shortcode', 'name' => 'shortcode', 'title' => _i("Shortcode"), 'orderable' => false],
        ];
    }
}
