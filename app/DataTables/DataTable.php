<?php

namespace App\DataTables;

use App\Models\Traits\TranslatableTrait;

abstract class DataTable extends \Yajra\DataTables\Services\DataTable
{
    protected static $actionColumnActions = ['edit', 'delete'];

    public function dataTable($query)
    {
        $controllerClass = get_class(request()->route()->getController());

        $dataTable = datatables($query)
            ->addColumn('action', function ($object) use ($controllerClass) {
                $resourcePrefix = $controllerClass::$resourcePrefix;
                $actions = static::$actionColumnActions;
                $view = "{$resourcePrefix}.includes.datatables.action";
                if (!view()->exists($view)) {
                    $view = 'includes.datatables.action';
                }
                return view($view, compact('object', 'resourcePrefix', 'actions'));
            })
            //->addColumn('bulk', function ($object) {
            //    return view('includes.datatables.bulk', compact('object'));
            //})
            ;

        $model = $controllerClass::$model;
        $traits = class_uses($model);
        $dates = (new $model)->getDates();

        if ($traits && in_array(TranslatableTrait::class, $traits)) {
            foreach ($model::$translatableColumns as $column) {
                /**
                 * Fix the TranslatableTrait::getAttribute not being called
                 */
                $dataTable->editColumn($column, function ($object) use ($column) {
                    return $object->{$column};
                });

                /**
                 * Search on translated columns
                 */
                $dataTable->filterColumn($column, function ($query, $keyword) use ($column) {
                    $query->where($column . '_' . \LaravelLocalization::getCurrentLocale(), 'like', '%' . $keyword . '%');
                });
            }
        }

        /**
         * Fix the __toString not being called on dates
         */
        foreach ($dates as $date) {
            $dataTable->editColumn($date, function ($object) use ($date) {
                return $object->{$date}->__toString();
            });
        }

        return $dataTable;
    }

    /**
     * Get the query object to be processed by dataaTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $controllerClass = get_class(request()->route()->getController());
        $model = $controllerClass::$model;
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
            ->minifiedAjax()
            ->addAction(['width' => '300px'])
            //->addColumn(['data' => 'bulk', 'title' => '<input type="checkbox" data-check-all="true" data-target=".bulk-checkbox">', 'orderable' => false])
            ->parameters($this->getBuilderParameters())
            ->parameters([
                'language' => static::getLanguage(),
                'pageLength' => 50,
            ]);
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        $controllerClass = get_class(request()->route()->getController());
        $model = $controllerClass::$model;
        return strtolower($model);
    }

    /**
     * Returns datatable language for i18n
     *
     * @return array
     */
    public static function getLanguage()
    {
        return [
            'emptyTable' => _i("No data available in table"),
            'info' => _i("Showing _START_ to _END_ of _TOTAL_ entries"),
            'infoEmpty' => _i("Showing 0 to 0 of 0 entries"),
            'infoFiltered' => _i("(filtered from _MAX_ total entries)"),
            'infoPostFix' => '',
            'lengthMenu' => _i("Show _MENU_ entries"),
            'loadingRecords' => _i("Loading..."),
            'processing' => _i("Processing..."),
            'search' => '_INPUT_',
            'zeroRecords' => _i("No matching records found"),
            'paginate' => [
                'first' => _i("First"),
                'last' => _i("Last"),
                'next' => _i("Next"),
                'previous' => _i("Previous"),
            ],
            'aria' => [
                'sortAscending' => _i(": activate to sort column ascending"),
                'sortDescending' => _i(": activate to sort column descending"),
            ],
            'searchPlaceholder' => _i("Quick search..."),
        ];
    }
}
