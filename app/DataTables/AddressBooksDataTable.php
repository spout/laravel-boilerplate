<?php

namespace App\DataTables;

use App\Models\AddressBook;

class AddressBooksDataTable extends DataTable
{
    protected static $model = AddressBook::class;
    protected static $resourcePrefix = 'admin.address-books';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => '__toString', 'name' => '__toString', 'title' => _i("Title")],
        ];
    }
}
