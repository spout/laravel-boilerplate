<?php
namespace App\Http\Controllers\Crud;

trait DeleteTrait
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model;
        $model::destroy($id);
        flash(trans("Record was deleted successfully!"), 'success');
        return redirect()->back();
    }
}