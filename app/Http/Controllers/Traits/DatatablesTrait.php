<?php
namespace App\Http\Controllers\Traits;

use Yajra\Datatables\Datatables;

trait DatatablesTrait
{
    public function datatables()
    {
        $model = static::$model;

        return Datatables::of($model::query())
            ->addColumn('bulk', function ($object) {
                return view('includes.crud.bulk', compact('object'));
            })
            ->addColumn('actions', function ($object) {
                $resourcePrefix = static::$resourcePrefix;
                return view('includes.crud.actions', compact('object', 'resourcePrefix'));
            })
            ->make(true);
    }
}