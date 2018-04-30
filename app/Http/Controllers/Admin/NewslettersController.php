<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewslettersDataTable;
use App\Http\Requests\NewsletterFormRequest;
use App\Models\Newsletter;

class NewslettersController extends AdminController
{
    public static $model = Newsletter::class;
    public static $requestClass = NewsletterFormRequest::class;
    public static $dataTableClass = NewslettersDataTable::class;
    public static $resourcePrefix = 'admin.newsletters';
}