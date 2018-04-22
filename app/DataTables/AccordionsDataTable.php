<?php

namespace App\DataTables;

class AccordionsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
