<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index($categorySlugPlural = null)
    {
        $category = Category::where('slug_plural', $categorySlugPlural)->firstOrFail();

        return view('products.index', compact('category'));
    }

    public function show($categorySlugSingular, $productSlug)
    {
        $product = Product::locale('slug', $productSlug)->firstOrFail();

        if ($product->absolute_url !== url()->current()) {
            return redirect()->to($product->absolute_url, 301);
        }

        return view('products.show', compact('product'));
    }
}