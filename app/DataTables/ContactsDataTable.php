<?php

namespace App\DataTables;

use App\Models\Contact;

class ContactsDataTable extends DataTable
{
    protected static $model = Contact::class;
    protected static $resourcePrefix = 'admin.contacts';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'email',
            'subject',
            'created_at',
            'updated_at',
        ];
    }
}
