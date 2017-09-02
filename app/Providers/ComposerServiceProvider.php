<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\ContentComposer;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\PropertyTypeComposer;
use App\Http\ViewComposers\EventTemplateComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $composers = [
            CategoryComposer::class => ['admin.blog.includes.form', 'admin.categories.includes.form'],
            ContentComposer::class => ['admin.contents.includes.form'],
            MenuComposer::class => ['admin.menus.includes.form'],
            PropertyTypeComposer::class => ['admin.properties.includes.form'],
            EventTemplateComposer::class => ['admin.event-templates.includes.form'],
        ];

        foreach ($composers as $callback => $views) {
            View::composer($views, $callback);
        }
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
