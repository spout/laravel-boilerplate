<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\EmailTemplatesDataTable;
use App\Http\Requests\EmailTemplateFormRequest;
use App\Models\EmailTemplate;

class EmailTemplatesController extends AdminController
{
    protected static $model = EmailTemplate::class;
    protected static $requestClass = EmailTemplateFormRequest::class;
    protected static $dataTableClass = EmailTemplatesDataTable::class;
}