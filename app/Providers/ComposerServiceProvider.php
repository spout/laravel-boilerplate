<?php

namespace App\Providers;

use App\Http\ViewComposers\AddressBookableListComposer;
use App\Http\ViewComposers\AdminComposer;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\ContentComposer;
use App\Http\ViewComposers\CountryListComposer;
use App\Http\ViewComposers\CurrentSiteComposer;
use App\Http\ViewComposers\FormListComposer;
use App\Http\ViewComposers\GlobalComposer;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\ModuleListComposer;
use App\Http\ViewComposers\SnippetComposer;
use App\Http\ViewComposers\TemplateFileListComposer;
use App\Http\ViewComposers\TemplateListComposer;
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
            CategoryComposer::class => [
                'admin.products.includes.form',
                'admin.categories.includes.form',
                'admin.amenities.includes.form',
                'admin.services.includes.form',
            ],
            ContentComposer::class => ['admin.contents.includes.form'],
            SnippetComposer::class => ['admin.snippets.includes.form'],
            CountryListComposer::class => [
                'admin.products.includes.form',
                'admin.events.includes.form',
                'admin.address-books.includes.form',
                'includes.modules.forms.maps'
            ],
            AddressBookableListComposer::class => ['admin.address-books.includes.form'],
            ModuleListComposer::class => ['admin.templates.includes.form'],
            TemplateFileListComposer::class => ['admin.templates.includes.form'],
            TemplateListComposer::class => ['admin.products.includes.form'],
            FormListComposer::class => ['includes.modules.forms.forms'],
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
