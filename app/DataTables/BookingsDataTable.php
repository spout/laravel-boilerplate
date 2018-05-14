<?php

namespace App\DataTables;

use App\Models\Booking;

class BookingsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'product.title', 'name' => 'product.title', 'title' => _i("Product")],
            ['data' => 'email', 'name' => 'email', 'title' => _i("Email")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }

    public function query()
    {
        $query = Booking::with(['product'])->select('bookings.*');

        return $this->applyScopes($query);
    }
}
