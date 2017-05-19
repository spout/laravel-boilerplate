<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public function compose(View $view)
    {
        $view->with('categoryList', Category::all()->pluck('title', 'id')->prepend('-', ''));
    }
}