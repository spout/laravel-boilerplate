<?php

namespace App\DataTables;

use App\Models\Redirection;

class RedirectionsDataTable extends DataTable
{
    protected static $model = Redirection::class;
    protected static $resourcePrefix = 'admin.redirections';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'domain', 'name' => 'domain', 'title' => _i("Domain")],
            ['data' => 'url', 'name' => 'url', 'title' => _i("URL")],
            ['data' => 'destination', 'name' => 'destination', 'title' => _i("Destination")],
        ];
    }
}
