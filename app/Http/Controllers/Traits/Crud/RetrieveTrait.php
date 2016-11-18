<?php
namespace App\Http\Controllers\Traits\Crud;

trait RetrieveTrait
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = static::$model;
        $object = $model::find($id);
        return view(sprintf('%s.show', $this->viewPath()), compact('object'));
    }
}