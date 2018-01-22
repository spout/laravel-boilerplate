<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EventTemplatesDataTable;
use App\Http\Requests\EventTemplateFormRequest;
use App\Models\EventTemplate;

class EventTemplatesController extends AdminController
{
    protected static $model = EventTemplate::class;
    protected static $requestClass = EventTemplateFormRequest::class;
    protected static $dataTableClass = EventTemplatesDataTable::class;
}