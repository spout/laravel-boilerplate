<?php
namespace App\Http\Controllers\Traits\Crud;

trait IndexTrait
{
    public $paginate = [
        'perPage' => 10
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = static::$model;
        $resourcePrefix = static::$resourcePrefix;
        $objectList = $model::paginate($this->paginate['perPage']);
        return view(sprintf('%s.index', $this->viewPath()), compact('objectList', 'resourcePrefix'));
    }
}