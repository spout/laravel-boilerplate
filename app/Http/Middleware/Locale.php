<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use LaravelGettext;
use LaravelLocalization;

class Locale
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $localeRegional = LaravelLocalization::getCurrentLocaleRegional();

        LaravelGettext::setLocale($localeRegional);
        Carbon::setLocale($locale);

        $format = config("locale.$locale.carbon.format");
        if (!empty($format)) {
            Carbon::setToStringFormat($format);
        }

        return $next($request);
    }
}