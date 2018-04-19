<?php

namespace App\Providers;

use App\Http\ViewComposers\AdminComposer;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\ContentComposer;
use App\Http\ViewComposers\CountryListComposer;
use App\Http\ViewComposers\CurrentSiteComposer;
use App\Http\ViewComposers\GlobalComposer;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\SnippetComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
            CurrentSiteComposer::class => '*',
            GlobalComposer::class => ['layouts.app'],
            AdminComposer::class => ['layouts.admin'],
            MenuComposer::class => ['admin.menus.includes.form'],
            CategoryComposer::class => ['admin.products.includes.form', 'admin.categories.includes.form'],
            ContentComposer::class => ['admin.contents.includes.form'],
            SnippetComposer::class => ['admin.snippets.includes.form'],
            CountryListComposer::class => ['admin.products.includes.form', 'admin.events.includes.form', 'admin.address-books.includes.form'],
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
