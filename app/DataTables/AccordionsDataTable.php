<?php

namespace App\DataTables;

use App\Models\Accordion;

class AccordionsDataTable extends DataTable
{
    protected static $model = Accordion::class;
    protected static $resourcePrefix = 'admin.accordions';

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
