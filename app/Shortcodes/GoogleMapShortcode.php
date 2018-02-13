<?php

namespace App\Shortcodes;

class GoogleMapShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $defaultAttributes = ['style' => 'width: 100%; height: 300px;'];
        $attributesArray = array_merge($defaultAttributes, $shortcode->toArray());
        foreach ($attributesArray as $attribute => $value) {
            $key = $attribute !== 'style' ? "data-{$attribute}" : $attribute;
            $attributes[$key] = $value;
        }
        return view('shortcodes.google-map', compact('attributes'));
    }
}