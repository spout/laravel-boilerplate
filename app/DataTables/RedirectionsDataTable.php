<?php

namespace App\DataTables;

class RedirectionsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'domain', 'name' => 'domain', 'title' => _i("Domain")],
            ['data' => 'url', 'name' => 'url', 'title' => _i("URL")],
            ['data' => 'destination', 'name' => 'destination', 'title' => _i("Destination")],
        ];
    }
}
