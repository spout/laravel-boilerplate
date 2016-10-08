<?php
namespace App\Http\Controllers\Crud;

trait ControllerTrait
{
    use CreateTrait, RetrieveTrait, UpdateTrait, DeleteTrait, IndexTrait;

    public $paginate = [
        'perPage' => 10
    ];

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