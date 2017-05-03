<?php
namespace App\Http\Controllers\Traits\Crud;

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
        $model = static::$model;
        $model::destroy($id);
        flash(_i("Record was deleted successfully!"), 'success');
        return redirect()->back();
    }
}