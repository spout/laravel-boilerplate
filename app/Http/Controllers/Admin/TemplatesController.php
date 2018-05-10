<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TemplatesDataTable;
use App\Http\Requests\TemplateFormRequest;
use App\Models\Template;

class TemplatesController extends AdminController
{
    public static $model = Template::class;
    public static $requestClass = TemplateFormRequest::class;
    public static $dataTableClass = TemplatesDataTable::class;
    public static $resourcePrefix = 'admin.templates';
}