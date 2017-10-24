<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * @link http://codehow.io/laravel-5-2-user-admin-roles/
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } elseif (!Auth::guard($guard)->user()->is_admin) {
            return redirect()->to('/')->withErrors(_i("Permission denied"));
        }

        return $next($request);
    }
}