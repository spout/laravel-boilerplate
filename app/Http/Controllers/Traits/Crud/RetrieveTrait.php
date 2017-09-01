<?php
namespace App\Http\Controllers\Traits\Crud;

trait RetrieveTrait
{
    /**
     * Display the specified resource.
     *
     * @param $pk
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($pk)
    {
        $model = static::$model;
        $object = $model::findOrFail($pk);
        return view("{$this->viewPath()}.show", compact('object'));
    }
}