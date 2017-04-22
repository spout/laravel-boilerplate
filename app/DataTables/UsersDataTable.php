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
            ['data' => 'id', 'name' => 'id', 'title' => __("ID")],
            ['data' => 'username', 'name' => 'username', 'title' => __("Username")],
            ['data' => 'email', 'name' => 'email', 'title' => __("Email")],
            ['data' => 'role', 'name' => 'role', 'title' => __("Role")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __("Created")],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __("Updated")],
        ];
    }
}
