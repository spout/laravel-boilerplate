<?php

namespace App\Http\ViewComposers;

use App\Models\Product;
use Illuminate\View\View;

class AddressBookableListComposer
{
    public function compose(View $view)
    {
        $models = [
            Product::class,
        ];

        $addressBookableList = ['' => '-'];
        foreach ($models as $model) {
            $label = ucfirst($model::verboseName());
            $rows = $model::all();
            foreach ($rows as $row) {
                $addressBookableList[$label]["{$model}.{$row->pk}"] = "{$label} > {$row->__toString()}";
            }
        }

        $view->with(compact('addressBookableList'));
    }
}