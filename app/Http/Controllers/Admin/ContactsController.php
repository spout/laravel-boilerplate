<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ContactsDataTable;
use App\Models\Contact;

class ContactsController extends AdminController
{
    protected static $model = Contact::class;
    protected static $dataTableClass = ContactsDataTable::class;
}