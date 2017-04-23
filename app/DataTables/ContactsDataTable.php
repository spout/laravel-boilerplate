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
            ['data' => 'id', 'name' => 'id', 'title' => __("ID"), 'searchable' => false],
            ['data' => 'email', 'name' => 'email', 'title' => __("Email")],
            ['data' => 'subject', 'name' => 'subject', 'title' => __("Subject")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __("Updated"), 'searchable' => false],
        ];
    }
}
