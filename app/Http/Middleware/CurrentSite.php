<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Config;

class CurrentSite
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domain = $_SERVER['HTTP_HOST'];
        $currentSite = Site::where('domain', $domain)->first();

        Config::set('currentSite', $currentSite);

        return $next($request);
    }
}