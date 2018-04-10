<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccordionsDataTable;
use App\Http\Requests\AccordionFormRequest;
use App\Models\Accordion;

class AccordionsController extends AdminController
{
    protected static $model = Accordion::class;
    protected static $requestClass = AccordionFormRequest::class;
    protected static $dataTableClass = AccordionsDataTable::class;
}