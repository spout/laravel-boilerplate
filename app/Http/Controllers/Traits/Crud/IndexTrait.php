<?php
namespace App\Http\Controllers\Traits\Crud;

use Yajra\Datatables\Datatables;
use Yajra\Datatables\Request;

trait IndexTrait
{
    /**
     * @return mixed
     */
    public function index()
    {
        $request = new Request();
        $viewFactory = view();
        $dataTable = new static::$dataTableClass(new Datatables($request), $viewFactory);
        return $dataTable->render("{$this->viewPath()}.index");
    }
}