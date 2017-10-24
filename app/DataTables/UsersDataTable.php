<?php

namespace App\DataTables;

use App\Models\User;

class UsersDataTable extends DataTable
{
    protected static $model = User::class;
    protected static $resourcePrefix = 'admin.users';

    public function dataTable($query)
    {
        $dataTable = parent::dataTable($query);
        $dataTable->editColumn('is_admin', function ($object) {
            return $object->is_admin ? _i("Yes") : _i("No");
        });
        return $dataTable;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'is_admin', 'name' => 'is_admin', 'title' => _i("Admin?")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
