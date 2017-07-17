<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crud\CrudTrait;

abstract class AdminController extends Controller
{
    /**
     * https://stackoverflow.com/questions/12478124/how-to-overload-class-constructor-within-traits-in-php-5-4
     */
    use CrudTrait {
        CrudTrait::__construct as private __crudConstruct;
    }

    public function __construct()
    {
        $this->__crudConstruct();
        $this->middleware('auth');
    }
}