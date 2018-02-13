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
        if (!empty($request->route()->action['domain'])) {
            Config::set('currentSite', Site::where('domain', $request->route()->action['domain'])->first());
        }

        return $next($request);
    }
}