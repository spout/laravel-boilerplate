<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('map.index', compact('categories'));
    }

    public function markers(Request $request)
    {
        $locale = \LaravelLocalization::getCurrentLocale();
        $categories = $request->input('categories', []);

        $products = Product::select('category_id', "title_{$locale}", 'lat', 'lng', 'country')
            ->whereHas('category', function ($q) use ($categories) {
                /** @var $q \Illuminate\Database\Eloquent\Builder */
                $q->whereIn('id', $categories);
            })->get();

        return response()->json($products);
    }
}
