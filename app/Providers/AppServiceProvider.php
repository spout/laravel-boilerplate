<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('menu', function($expression) {
            return "<?php echo App\\Providers\\Directives\\MenuDirective::display($expression); ?>";
        });

        Blade::directive('breadcrumb', function ($expression) {
            return "<?php echo App\\Providers\\Directives\\BreadcrumbsDirective::breadcrumb($expression); ?>";
        });

        Blade::directive('renderBreadcrumbs', function ($expression) {
            return "<?php echo App\\Providers\\Directives\\BreadcrumbsDirective::renderBreadcrumbs($expression); ?>";
        });

        Blade::directive('snippet', function ($expression) {
            return "<?php echo App\\Providers\\Directives\\SnippetDirective::display($expression); ?>";
        });

        Blade::directive('tree', function ($expression) {
            return "<?php echo App\\Providers\\Directives\\TreeDirective::display($expression); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
