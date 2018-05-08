<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsletterEmailsDataTable;
use App\Http\Requests\NewsletterEmailFormRequest;
use App\Models\NewsletterEmail;

class NewsletterEmailsController extends AdminController
{
    public static $model = NewsletterEmail::class;
    public static $requestClass = NewsletterEmailFormRequest::class;
    public static $dataTableClass = NewsletterEmailsDataTable::class;
    public static $resourcePrefix = 'admin.newsletter-emails';
}