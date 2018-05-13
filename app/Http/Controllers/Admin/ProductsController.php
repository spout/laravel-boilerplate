<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends AdminController
{
    public static $model = Product::class;
    public static $requestClass = ProductFormRequest::class;
    public static $dataTableClass = ProductsDataTable::class;
    public static $resourcePrefix = 'admin.products';

    public function editModule($pk, $placeholderId)
    {
        $model = static::$model;
        $object = $model::findOrFail($pk);

        return view("{$this->viewPath()}.edit-module", compact('object', 'placeholderId'));
    }

    public function updateModule(Request $request, $pk)
    {
        $model = static::$model;
        $object = $model::find($pk);
        $input = $request->all();
        $object->update($input);
        flash(_i("Record was updated successfully!"), 'success');
        return redirect()->route("{$this->viewPath()}.edit-module", [$object->pk]);
    }
}