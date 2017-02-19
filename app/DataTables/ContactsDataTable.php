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
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'email', 'title' => __("Email")],
            ['data' => 'subject', 'title' => __("Subject")],
            ['data' => 'created_at', 'title' => __("Created")],
            ['data' => 'updated_at', 'title' => __("Updated")],
        ];
    }
}
