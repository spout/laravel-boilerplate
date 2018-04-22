<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccordionsDataTable;
use App\Http\Requests\AccordionFormRequest;
use App\Models\Accordion;

class AccordionsController extends AdminController
{
    public static $model = Accordion::class;
    public static $requestClass = AccordionFormRequest::class;
    public static $dataTableClass = AccordionsDataTable::class;
}