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
Route::get('/home', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/{pk}-{slug}', 'BlogController@show')->name('blog.show');
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('{slug}', 'PagesController@show');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('/file-manager', 'FileManagerController@index')->name('admin.file_manager.index');
    //Route::group(['prefix' => 'blog'], function () {
    //    Route::get('/', 'BlogController@index');
    //});

    Route::get('contents/datatables', 'ContentsController@datatables')->name('admin.contents.datatables');
    Route::resource('contents', 'ContentsController', [
        'names' => [
            'store' => 'admin.contents.store',
            'index' => 'admin.contents.index',
            'create' => 'admin.contents.create',
            'destroy' => 'admin.contents.destroy',
            'update' => 'admin.contents.update',
            'show' => 'admin.contents.show',
            'edit' => 'admin.contents.edit',
        ]
    ]);

    Route::get('blog/datatables', 'BlogController@datatables')->name('admin.blog.datatables');
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

    Route::get('categories/datatables', 'CategoriesController@datatables')->name('admin.categories.datatables');
    Route::resource('categories', 'CategoriesController', [
        'names' => [
            'store' => 'admin.categories.store',
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'destroy' => 'admin.categories.destroy',
            'update' => 'admin.categories.update',
            'show' => 'admin.categories.show',
            'edit' => 'admin.categories.edit',
        ]
    ]);

    Route::get('menus/datatables', 'MenusController@datatables')->name('admin.menus.datatables');
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

    Route::get('users/datatables', 'UsersController@datatables')->name('admin.users.datatables');
    Route::resource('users', 'UsersController', [
        'names' => [
            'store' => 'admin.users.store',
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'destroy' => 'admin.users.destroy',
            'update' => 'admin.users.update',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
        ]
    ]);

    Route::get('configs/datatables', 'ConfigsController@datatables')->name('admin.configs.datatables');
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
});

/**
 * Define elFinder routes here before catch all /{slug} below
 */
Route::group(['namespace' => 'Barryvdh\Elfinder', 'prefix' => 'elfinder'], function () {
    Route::get('/', 'ElfinderController@showIndex');
    Route::any('connector', ['as' => 'elfinder.connector', 'uses' => 'ElfinderController@showConnector']);
    Route::get('popup/{input_id}', ['as' => 'elfinder.popup', 'uses' => 'ElfinderController@showPopup']);
    Route::get('filepicker/{input_id}', ['as' => 'elfinder.filepicker', 'uses' => 'ElfinderController@showFilePicker']);
    Route::get('tinymce', ['as' => 'elfinder.tinymce', 'uses' => 'ElfinderController@showTinyMCE']);
    Route::get('tinymce4', ['as' => 'elfinder.tinymce4', 'uses' => 'ElfinderController@showTinyMCE4']);
    Route::get('ckeditor', ['as' => 'elfinder.ckeditor', 'uses' => 'ElfinderController@showCKeditor4']);
});

Route::get('/{slug}', 'ContentsController@show')->where('slug', '[a-z0-9-]+');