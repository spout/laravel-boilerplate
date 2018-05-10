<?php

namespace App\DataTables;

use App\Models\Product;

class ProductsDataTable extends DataTable
{
    protected function getColumns()
    {
        $locale = \LaravelLocalization::getCurrentLocale();

        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => "category.title_plural_{$locale}", 'name' => "category.title_plural_{$locale}", 'title' => _i("Category")],
            ['data' => 'template.title', 'name' => 'template.title', 'title' => _i("Template")],
        ];
    }

    public function query()
    {
        $query = Product::with(['category', 'template'])->select('products.*');

        return $this->applyScopes($query);
    }
}
