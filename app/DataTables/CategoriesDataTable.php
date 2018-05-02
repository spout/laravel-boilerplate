<?php

namespace App\DataTables;

class CategoriesDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('marker_icon', function ($object) {
            return '<img src="' . $object->marker_icon_url . '" alt="">';
        });
        $dataTable->rawColumns(['action', 'marker_icon']);
        return $dataTable;
    }

    protected function getColumns()
    {
        return [
            ['data' => 'title_plural', 'name' => 'title_plural', 'title' => _i("Title plural")],
            ['data' => 'slug_plural', 'name' => 'slug_plural', 'title' => _i("Slug plural")],
            ['data' => 'title_singular', 'name' => 'title_singular', 'title' => _i("Title singular")],
            ['data' => 'slug_singular', 'name' => 'slug_singular', 'title' => _i("Slug singular")],
            ['data' => 'marker_icon', 'name' => 'marker_icon', 'title' => _i("Marker icon"), 'searchable' => false, 'sortable' => false],
        ];
    }
}
