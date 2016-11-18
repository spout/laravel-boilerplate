<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (glob(app_path() . '/Observers/*.php') as $filename) {
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $observerClass = 'App\\Observers\\' . $filename;
            $modelClass = 'App\\Models\\' . str_replace('Observer', '', $filename);
            $modelClass::observe($observerClass);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}