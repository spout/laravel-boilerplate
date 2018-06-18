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

        if (Auth::check() && empty($user->is_admin)) {
            $products = $user->products;
            $roots = [];
            foreach ($products as $product) {
                $roots[] = [
                    'driver' => 'LocalFileSystem',
                    'path' => public_path("files/products/{$product->slug_en}"),
                    'accessControl' => 'App\Libraries\Elfinder::checkAccess',
                ];
            }

            \Config::set('elfinder.roots', $roots);
        }

        return $next($request);
    }
}