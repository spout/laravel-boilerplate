<?php
namespace App\Http\Controllers\Traits\Crud;

use Illuminate\Http\Request;

trait UpdateTrait
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param $pk
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($pk)
    {
        $model = static::$model;
        $object = $model::findOrFail($pk);
        return view("{$this->viewPath()}.edit", compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $pk
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $pk)
    {
        $model = static::$model;
        $object = $model::find($pk);
        $input = $request->all();
        $object->update($input);
        flash(_i("Record was updated successfully!"), 'success');
        return redirect()->route("{$this->viewPath()}.edit", [$object->pk]);
    }
}