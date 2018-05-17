<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductFormRequest;
use App\Models\Model;
use App\Models\Placeholder;
use App\Models\Product;

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
        $placeholder = Placeholder::find($placeholderId);

        $moduleConfig = config("modules.{$placeholder->module_slug}");

        /** @var Model $moduleModel */
        $moduleModel = $moduleConfig['model'];
        /** @var \Illuminate\Foundation\Http\FormRequest $moduleFormRequest */
        $moduleFormRequest = $moduleConfig['formRequest'];

        $moduleModelInstance = $moduleModel::firstOrNew(['product_id' => $object->pk, 'placeholder_id' => $placeholderId]);

        if (!request()->isMethod('get')) {
            app($moduleFormRequest);

            $moduleModelInstance->fill(request()->all());
            $moduleModelInstance->save();

            flash(_i("Module was updated successfully!"), 'success');
        }

        return view("{$this->viewPath()}.edit-module", compact('object', 'placeholder', 'moduleModelInstance'));
    }
}
