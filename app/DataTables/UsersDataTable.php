<?php

namespace App\DataTables;

use App\Models\User;

class UsersDataTable extends DataTable
{
    protected static $model = User::class;
    protected static $resourcePrefix = 'admin.users';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'role', 'name' => 'role', 'title' => _i("Role")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
