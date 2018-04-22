<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AddressBooksDataTable;
use App\Http\Requests\AddressBookFormRequest;
use App\Models\AddressBook;

class AddressBooksController extends AdminController
{
    public static $model = AddressBook::class;
    public static $requestClass = AddressBookFormRequest::class;
    public static $dataTableClass = AddressBooksDataTable::class;
}