<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\MenuItem;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'admin.blog.includes.form',
            'admin.categories.includes.form'
        ], function ($view) {
            $view->with('categoryList', Category::all()->pluck('title', 'id'));
        });

        View::composer([
            'admin.menus.includes.form'
        ], function ($view) {
            $view->with('parentList', MenuItem::where('menu_id', $view->object->id)->get()->pluck('title', 'id'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
