<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Content;

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
            'admin.contents.includes.form'
        ], function ($view) {
            $view->with('contentList', Content::where('id', '!=', $view->object->id)->pluck('title', 'id'));
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
