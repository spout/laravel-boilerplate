<?php
namespace App\Providers\Directives;

class BreadcrumbsDirective
{
    public static $breadcrumbs = [];

    public static function breadcrumb($expression)
    {
        self::$breadcrumbs[] = $expression;
    }

    public static function renderBreadcrumbs()
    {
        $breadcrumbs = array_merge([['route' => 'homepage', 'title' => config('app.name')]], self::$breadcrumbs);
        return view('breadcrumbs.render', compact('breadcrumbs'));
    }
}
