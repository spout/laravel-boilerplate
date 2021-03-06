<?php

namespace App\DataTables;

class ContactsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'company', 'name' => 'company', 'title' => _i("Company")],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'subject', 'name' => 'subject', 'title' => _i("Subject")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
