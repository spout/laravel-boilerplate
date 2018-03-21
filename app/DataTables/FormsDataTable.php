<?php

namespace App\DataTables;

use App\Models\Form;

class FormsDataTable extends DataTable
{
    protected static $model = Form::class;
    protected static $resourcePrefix = 'admin.forms';

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
