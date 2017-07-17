<?php
namespace App\Http\Controllers\Traits\Crud;

use Illuminate\Http\Request;

trait CreateTrait
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new static::$model;
        return view("{$this->viewPath()}.create", compact('object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = static::$model;
        $input = $request->all();
        $object = $model::create($input);
        flash(_i("Record was created successfully!"), 'success');
        return redirect()->route("{$this->viewPath()}.edit", ['id' => $object->id]);
    }
}