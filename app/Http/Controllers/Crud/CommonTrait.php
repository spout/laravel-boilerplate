<?php
namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;

trait CommonTrait
{
    public function __construct()
    {
        /**
         * https://laracasts.com/discuss/channels/general-discussion/l5how-to-use-form-validation-request-injection-in-a-subclass/replies/184943
         */
        if (!\App::runningInConsole() && isset(static::$requestClass)) {
            app()->bind(Request::class, function ($app) {
                return $app->make(static::$requestClass);
            });
        }
    }

    protected function viewPath()
    {
        $path = strtolower(str_replace('Controller', '', class_basename(static::class)));
        $prefix = request()->route()->getPrefix();
        if (!empty($prefix)) {
            $path = sprintf('%s.%s', $prefix, $path);
        }
        return $path;
    }
}