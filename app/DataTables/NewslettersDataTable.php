<?php

namespace App\DataTables;

class NewslettersDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'firstname', 'name' => 'firstname', 'title' => _i("Firstname")],
            ['data' => 'lastname', 'name' => 'lastname', 'title' => _i("Lastname")],
        ];
    }
}
