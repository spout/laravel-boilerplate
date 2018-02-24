<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $categoryList = Category::all()->pluck('title_plural', 'id')->prepend(_i("All categories"), '');
        return view('map.index', compact('categoryList'));
    }

    public function markers(Request $request)
    {
        return response()->json([]);
    }
}
