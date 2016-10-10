<?php
namespace App\Http\Controllers\Crud;

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
        $objectList = $model::paginate($this->paginate['perPage']);
        return view(sprintf('%s.index', $this->viewPath()), compact('objectList'));
    }
}