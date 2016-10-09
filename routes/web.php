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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PagesController@show');

Route::group(['prefix' => 'pages'], function () {
    Route::get('{slug}', 'PagesController@show');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'DashboardController@index');
    //Route::group(['prefix' => 'blog'], function () {
    //    Route::get('/', 'BlogController@index');
    //});

    Route::resource('configs', 'ConfigsController', [
        'names' => [
            'store' => 'admin.configs.store',
            'index' => 'admin.configs.index',
            'create' => 'admin.configs.create',
            'destroy' => 'admin.configs.destroy',
            'update' => 'admin.configs.update',
            'show' => 'admin.configs.show',
            'edit' => 'admin.configs.edit',
        ]
    ]);

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

    Route::resource('menus', 'MenusController', [
        'names' => [
            'store' => 'admin.menus.store',
            'index' => 'admin.menus.index',
            'create' => 'admin.menus.create',
            'destroy' => 'admin.menus.destroy',
            'update' => 'admin.menus.update',
            'show' => 'admin.menus.show',
            'edit' => 'admin.menus.edit',
        ]
    ]);
});

Route::get('/{slug}', 'ContentsController@show')->where('slug', '[a-z0-9-]+');
