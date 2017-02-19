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
            'id',
            'username',
            'email',
            'role',
            'created_at',
            'updated_at',
        ];
    }
}
