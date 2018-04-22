<?php

namespace App\DataTables;

class UsersDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('is_admin', function ($object) {
            return $object->is_admin ? _i("Yes") : _i("No");
        });
        return $dataTable;
    }

    protected function getColumns()
    {
        return [
            ['data' => 'firstname', 'name' => 'firstname', 'title' => _i("Firstname")],
            ['data' => 'lastname', 'name' => 'lastname', 'title' => _i("Lastname")],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'is_admin', 'name' => 'is_admin', 'title' => _i("Admin?")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
