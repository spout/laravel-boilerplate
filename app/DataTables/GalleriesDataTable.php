<?php

namespace App\DataTables;

use App\Models\Gallery;

class GalleriesDataTable extends DataTable
{
    protected static $model = Gallery::class;
    protected static $resourcePrefix = 'admin.galleries';

    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('shortcode', function ($object) {
            return $object->shortcode;
        });
        return $dataTable;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'shortcode', 'name' => 'shortcode', 'title' => _i("Shortcode"), 'orderable' => false],
        ];
    }
}
