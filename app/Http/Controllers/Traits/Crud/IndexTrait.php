<?php

namespace App\Http\Controllers\Traits\Crud;

use Yajra\DataTables\DataTables;
use \Yajra\DataTables\Utilities\Request;

trait IndexTrait
{
    /**
     * @return mixed
     */
    public function index()
    {
        $illuminateRequest = request();
        $request = new Request($illuminateRequest);
        $viewFactory = view();
        $dataTable = new static::$dataTableClass(new DataTables($request), $viewFactory);
        return $dataTable->render("{$this->viewPath()}.index");
    }
}