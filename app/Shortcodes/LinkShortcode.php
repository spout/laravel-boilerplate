<?php
namespace App\Shortcodes;

class LinkShortcode
{
    /**
     * @param \Webwizo\Shortcodes\Compilers\Shortcode $shortcode
     * @param $content
     * @param $compiler
     * @param $name
     * @param $viewData
     *
     * @return string
     */
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $nonRouteParams = ['route', 'class'];
        $params = array_filter($shortcode->toArray(), function ($key) use ($nonRouteParams) {
            return !in_array($key, $nonRouteParams);
        }, ARRAY_FILTER_USE_KEY);

        $url = route($shortcode->route, $params);
        return sprintf('<a href="%s"%s>%s</a>', $url, is_null($shortcode->class) ? '' : " {$shortcode->class}", $content);
    }
}