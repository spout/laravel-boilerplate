<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AddressBooksDataTable;
use App\Http\Requests\AddressBookFormRequest;
use App\Models\AddressBook;

class AddressBooksController extends AdminController
{
    protected static $model = AddressBook::class;
    protected static $requestClass = AddressBookFormRequest::class;
    protected static $dataTableClass = AddressBooksDataTable::class;
}