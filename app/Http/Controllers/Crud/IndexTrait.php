<?php
namespace App\Http\Controllers\Crud;

trait IndexTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->model;
        $objectList = $model::paginate($this->paginate['perPage']);
        return view(sprintf('%s.index', $this->viewPath()), compact('objectList'));
    }
}