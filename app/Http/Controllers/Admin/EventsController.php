<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EventsDataTable;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;

class EventsController extends AdminController
{
    protected static $model = Event::class;
    protected static $requestClass = EventFormRequest::class;
    protected static $dataTableClass = EventsDataTable::class;
}