<?php
namespace App\Http\Controllers\Crud;

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
        $model = $this->model;
        $object = new $model;
        return view(sprintf('%s.create', $this->viewPath()), compact('object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $this->model;
        $input = $request->all();
        $model::create($input);
        flash(__("Record was created successfully!"), 'success');
        return redirect()->back();
    }
}