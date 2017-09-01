<?php
namespace App\Http\Controllers\Traits\Crud;

trait DeleteTrait
{
    /**
     * Remove the specified resource from storage.
     *
     * @param $pk
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($pk)
    {
        $model = static::$model;
        $model::destroy($pk);
        flash(_i("Record was deleted successfully!"), 'success');
        return redirect()->back();
    }
}