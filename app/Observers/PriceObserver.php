<?php

namespace App\Observers;

use App\Models\Price;
use App\Models\PriceCategory;
use App\Models\PriceItem;

class PriceObserver
{
    public function saved(Price $price)
    {
        // Delete all associated prices
        PriceItem::where('price_id', $price->id)->delete();

        $productId = request()->input('product_id');

        foreach (request()->input('prices', []) as $priceInput) {
            $priceCategoryAttributes = [
                'product_id' => $productId,
            ];

            foreach (config('app.locales') as $lang => $locale) {
                $priceCategoryAttributes["title_{$lang}"] = $priceInput['category'][$lang];
            }

            $priceCategory = PriceCategory::firstOrCreate($priceCategoryAttributes);

            $priceItemAttributes = [
                'price_id' => $price->id,
                'price_category_id' => $priceCategory->id,
            ];
            foreach ($priceInput['items'] as $item) {
                $priceItemAttributes['price'] = $item['price'];
                $priceItemAttributes['date_start'] = $item['date_start'];
                $priceItemAttributes['date_end'] = $item['date_end'];

                foreach (config('app.locales') as $lang => $locale) {
                    $priceItemAttributes["title_{$lang}"] = $item['title'][$lang];
                }
            }

            PriceItem::create($priceItemAttributes);
        }
    }
}