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
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'subject', 'name' => 'subject', 'title' => _i("Subject")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
