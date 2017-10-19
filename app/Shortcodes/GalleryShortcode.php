<?php
namespace App\Shortcodes;

class GalleryShortcode
{
    public static $config = [
        'columns' => [
            'total' => 12,
            'default' => 4,
        ],
        'template' => [
            'default' => 'large'
        ],
    ];

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $items = glob(public_path($shortcode->directory) . '/*.{jpg,png,gif}', GLOB_BRACE);
        $totalColumns = static::$config['columns']['total'];
        $columns = $shortcode->columns ?? static::$config['columns']['default'];
        if ($totalColumns % $columns) {
            $columns = static::$config['columns']['default'];
        }
        $template = $shortcode->template ?? static::$config['template']['default'];
        return view('shortcodes.gallery', compact('shortcode', 'items', 'totalColumns', 'columns', 'template'));
    }
}