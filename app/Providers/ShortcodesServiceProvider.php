<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Shortcodes/*.php') as $filename) {
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $class = 'App\\Shortcodes\\' . $filename;
            if (property_exists($class, 'name')) {
                $name = $class::$name;
            } else {
                $name = kebab_case(class_basename(str_replace('Shortcode', '', $filename)));
            }
            \Shortcode::register($name, $class);
        }
    }
}
