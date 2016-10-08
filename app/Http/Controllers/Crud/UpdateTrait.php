<?php
namespace App\Http\Controllers\Crud;

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
        $model = $this->model;
        $object = $model::find($id);
        return view(sprintf('%s.edit', $this->viewPath()), compact('object'));
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
        $model = $this->model;
        $object = $model::find($id);
        $input = $request->all();
        $object->update($input);
        $object->save();
        flash(__("Record was updated successfully!"), 'success');
        return redirect()->back();
    }
}