<?php

namespace App\DataTables;

use App\Html\FormBuilder;
use Collective\Html\FormFacade;

abstract class DataTable extends \Yajra\Datatables\Services\DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($object) {
                $resourcePrefix = static::$resourcePrefix;
                return view('includes.datatables.action', compact('object', 'resourcePrefix'));
            })
            //->addColumn('bulk', function ($object) {
            //    return view('includes.datatables.bulk', compact('object'));
            //})
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataaTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $model = static::$model;
        $query = $model::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->addAction(['width' => '200px'])
            //->addColumn(['data' => 'bulk', 'title' => '<input type="checkbox" data-check-all="true" data-target=".bulk-checkbox">', 'orderable' => false])
            ->parameters($this->getBuilderParameters())
            ->parameters([
                'language' => [
                    'emptyTable' => __("No data available in table"),
                    'info' => __("Showing _START_ to _END_ of _TOTAL_ entries"),
                    'infoEmpty' => __("Showing 0 to 0 of 0 entries"),
                    'infoFiltered' => __("(filtered from _MAX_ total entries)"),
                    'infoPostFix' => '',
                    'lengthMenu' => __("Show _MENU_ entries"),
                    'loadingRecords' => __("Loading..."),
                    'processing' => __("Processing..."),
                    'search' => '_INPUT_',
                    'zeroRecords' => __("No matching records found"),
                    'paginate' => [
                        'first' => __("First"),
                        'last' => __("Last"),
                        'next' => __("Next"),
                        'previous' => __("Previous"),
                    ],
                    'aria' => [
                        'sortAscending' => __(": activate to sort column ascending"),
                        'sortDescending' => __(": activate to sort column descending"),
                    ],
                    'searchPlaceholder' => __("Quick search..."),
                ]
            ]);
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return strtolower(static::$model);
    }
}
