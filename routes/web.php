<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('/{slug}', 'PagesController@view');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'DashboardController@index');
    //Route::group(['prefix' => 'blog'], function () {
    //    Route::get('/', 'BlogController@index');
    //});

    Route::resource('blog', 'BlogController', [
        'names' => [
            'store' => 'admin.blog.store',
            'index' => 'admin.blog.index',
            'create' => 'admin.blog.create',
            'destroy' => 'admin.blog.destroy',
            'update' => 'admin.blog.update',
            'show' => 'admin.blog.show',
            'edit' => 'admin.blog.edit',
        ]
    ]);
});
