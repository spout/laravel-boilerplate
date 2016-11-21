<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Models\Contact;

class ContactsController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Contact::class;
    protected static $resourcePrefix = 'admin.contacts';
}