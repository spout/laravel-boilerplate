<?php

namespace App\DataTables;

use App\Models\Form;

class FormsDataTable extends DataTable
{
    protected static $model = Form::class;
    protected static $resourcePrefix = 'admin.forms';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
