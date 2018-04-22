<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EventsDataTable;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;

class EventsController extends AdminController
{
    public static $model = Event::class;
    public static $requestClass = EventFormRequest::class;
    public static $dataTableClass = EventsDataTable::class;
    public static $resourcePrefix = 'admin.events';
}