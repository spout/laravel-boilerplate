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
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'username', 'title' => __("Username")],
            ['data' => 'email', 'title' => __("Email")],
            ['data' => 'role', 'title' => __("Role")],
            ['data' => 'created_at', 'title' => __("Created")],
            ['data' => 'updated_at', 'title' => __("Updated")],
        ];
    }
}
