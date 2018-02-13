<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FormsDataTable;
use App\Http\Requests\FormFormRequest;
use App\Models\Form;

class FormsController extends AdminController
{
    protected static $model = Form::class;
    protected static $requestClass = FormFormRequest::class;
    protected static $dataTableClass = FormsDataTable::class;
}