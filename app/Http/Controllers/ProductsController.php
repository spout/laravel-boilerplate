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

        if (request()->has('criterias')) {
            $criterias = request()->input('criterias');
            $products->whereHas('criterias', function ($q) use ($criterias) {
                /** @var Builder $q */
                $q->whereIn('criterias.id', $criterias);
            });
        }

        if (request()->isXmlHttpRequest()) {
            sleep(2);
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