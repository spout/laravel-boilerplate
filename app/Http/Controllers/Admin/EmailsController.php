<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\EmailsDataTable;
use App\Http\Requests\EmailFormRequest;
use App\Models\Email;

class EmailsController extends AdminController
{
    protected static $model = Email::class;
    protected static $requestClass = EmailFormRequest::class;
    protected static $dataTableClass = EmailsDataTable::class;
}