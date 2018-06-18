<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Taggable;

class ProductObserver
{
    public function saved(Product $product)
    {
        $attributes = [
            'taggable_id' => $product->id,
            'taggable_type' => Product::class,
        ];

        Taggable::where($attributes)->delete();

        foreach (request()->input('tags', []) as $k => $tag) {
            $attributes['tag_id'] = $tag;
            Taggable::create($attributes);
        }

        $path = "files/products/{$product->slug_en}/";
        $dir = public_path($path);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}