<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Elfinder
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
        $user = Auth::user();

        if (empty($user->is_admin)) {
            $path = "files/users/{$user->id}/";
            $dir = public_path($path);

            if (!is_dir($dir)) {
                mkdir($dir);
            }

            \Config::set('elfinder.dir', [$path]);
        }

        return $next($request);
    }
}