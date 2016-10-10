<?php
namespace App\Http\Controllers\Crud;

trait CommonTrait
{
    protected function viewPath()
    {
        $path = strtolower(str_replace('Controller', '', class_basename(static::class)));
        $prefix = request()->route()->getPrefix();
        if (!empty($prefix)) {
            $path = sprintf('%s.%s', $prefix, $path);
        }
        return $path;
    }
}