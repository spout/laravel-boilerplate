<?php

namespace App\DataTables;

use App\Models\Amenity;

class AmenitiesDataTable extends DataTable
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
        $query = Amenity::with(['category'])->select('amenities.*');

        return $this->applyScopes($query);
    }
}
