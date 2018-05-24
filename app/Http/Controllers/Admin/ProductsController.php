<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductFormRequest;
use App\Models\Amenity;
use App\Models\Form;
use App\Models\Module;
use App\Models\Placeholder;
use App\Models\Product;
use App\Models\Service;

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

            $modulableMapping = [
                'amenities' => Amenity::class,
                'services' => Service::class,
                'forms' => Form::class,
            ];

            if (array_key_exists($placeholder->module_slug, $modulableMapping)) {
                $moduleModel::where($attributes)->delete();

                foreach (request()->input('modulables', []) as $id) {
                    $attributes['modulable_id'] = $id;
                    $attributes['modulable_type'] = $modulableMapping[$placeholder->module_slug];
                    $moduleModel::create($attributes);
                }
            } else {
                $moduleModelInstance->fill(request()->all());
                $moduleModelInstance->save();
            }

            flash(_i("Updated successfully!"), 'success');
            return redirect()->back();
        }

        return view("{$this->viewPath()}.edit-module", compact('object', 'placeholder', 'moduleModelInstance', 'moduleModelInstances'));
    }
}
