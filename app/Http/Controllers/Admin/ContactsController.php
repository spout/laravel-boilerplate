<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactsDataTable;
use App\Models\Contact;

class ContactsController extends AdminController
{
    public static $model = Contact::class;
    public static $dataTableClass = ContactsDataTable::class;
}