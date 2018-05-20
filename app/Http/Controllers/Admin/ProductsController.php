<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductFormRequest;
use App\Models\Amenity;
use App\Models\Module;
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
        $productId = $object->pk;

        $module = Module::find($placeholder->module_slug);
        $moduleModel = $module->model_class;

        $attributes = ['product_id' => $productId, 'placeholder_id' => $placeholderId];

        $moduleModelInstance = $moduleModel::firstOrNew($attributes);
        $moduleModelInstances = $moduleModel::where($attributes)->get();

        if (!request()->isMethod('get')) {
            app($module->form_request_class);

            switch ($placeholder->module_slug) {
                case 'amenities':
                    $moduleModel::where($attributes)->delete();

                    foreach (request()->input('amenities', []) as $amenityId) {
                        $attributes['amenity_id'] = $amenityId;
                        $moduleModel::create($attributes);
                    }
                    break;

                default:
                    $moduleModelInstance->fill(request()->all());
                    $moduleModelInstance->save();
                    break;
            }

            flash(_i("Updated successfully!"), 'success');
            return redirect()->back();
        }

        return view("{$this->viewPath()}.edit-module", compact('object', 'placeholder', 'moduleModelInstance', 'moduleModelInstances'));
    }
}
