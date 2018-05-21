<?php

namespace App\DataTables;

use App\Models\Service;

class ServicesDataTable extends DataTable
{
    protected function getColumns()
    {
        $locale = \LaravelLocalization::getCurrentLocale();

        return [
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            ['data' => "category.title_plural_{$locale}", 'name' => "category.title_plural_{$locale}", 'title' => _i("Category")],
        ];
    }

    public function query()
    {
        $query = Service::with(['category'])->select('services.*');

        return $this->applyScopes($query);
    }
}
