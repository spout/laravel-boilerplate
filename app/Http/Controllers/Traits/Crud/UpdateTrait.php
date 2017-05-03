<?php
namespace App\Http\Controllers\Traits\Crud;

use Illuminate\Http\Request;

trait UpdateTrait
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = static::$model;
        $object = $model::findOrFail($id);
        return view("{$this->viewPath()}.edit", compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = static::$model;
        $object = $model::find($id);
        $input = $request->all();
        $object->update($input);
        $object->save();
        flash(_i("Record was updated successfully!"), 'success');
        return redirect()->back();
    }
}