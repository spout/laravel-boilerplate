<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PropertyType;

class PropertyTypeComposer
{
    public function compose(View $view)
    {
        $view->with('propertyTypeList', PropertyType::all()->pluck('title', 'id')->prepend('-', ''));
    }
}