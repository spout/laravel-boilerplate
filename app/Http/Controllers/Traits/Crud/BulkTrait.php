<?php
namespace App\Http\Controllers\Traits\Crud;

use Illuminate\Http\Request;

trait BulkTrait
{
    public function bulk(Request $request)
    {
        $action = $request->input('action');
        $bulk = $request->input('bulk');

        if (!empty($action) && !empty($bulk)) {
            $model = static::$model;
            $method = 'bulk' . studly_case($action);
            $model::$method($bulk);
            flash(__("Records were updated successfully!"), 'success');
        }

        return redirect()->back();
    }
}