<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Query\Builder;

class ProductsController extends Controller
{
    public function index($categorySlugPlural = null)
    {
        $products = Product::query();
        $data = [];

        if (!is_null($categorySlugPlural)) {
            $category = Category::locale('slug_plural', $categorySlugPlural)->firstOrFail();
            $products->where('category_id', $category->id);

            $data['category'] = $category;
        } else {
            $categories = Category::all();
            $data['categories'] = $categories;
        }

        if (request()->has('categories')) {
            $products->whereIn('category_id', request()->input('categories'));
        }

        if (request()->has('tags')) {
            $tags = request()->input('tags');
            $products->whereHas('tags', function ($q) use ($tags) {
                /** @var Builder $q */
                $q->whereIn('tags.id', $tags);
            });
        }

        $data['products'] = $products->paginate(50);

        return view('products.index', $data);
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