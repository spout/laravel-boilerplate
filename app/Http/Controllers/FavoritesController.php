<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FavoritesController extends Controller
{
    const COOKIE_NAME = 'favorites';

    public function index(Request $request)
    {
        $favorites = Favorite::where('cookie', $request->cookie(self::COOKIE_NAME))->get();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $favorite = Favorite::where('user_id', $userId)->first();
            if (!empty($favorite)) {
                $cookieValue = $favorite->cookie;
            }
        }

        if (empty($cookieValue)) {
            $cookieValue = $request->cookie(self::COOKIE_NAME, uniqid('', true));
        }

        Cookie::queue(Cookie::forever(self::COOKIE_NAME, $cookieValue));

        flash(_i("Added in your favorites."), 'success');
        return redirect()->back();
    }

    public function destroy()
    {

    }

}