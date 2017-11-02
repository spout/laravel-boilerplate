<?php

namespace App\Http\Middleware;

use App;
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
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $localeRegional = LaravelLocalization::getCurrentLocaleRegional();

        App::setLocale($locale);
        LaravelGettext::setLocale($localeRegional);
        Carbon::setLocale($locale);

        $format = config("locale.$locale.carbon.format");
        if (!empty($format)) {
            Carbon::setToStringFormat($format);
        }

        return $next($request);
    }
}