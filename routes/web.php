<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function () {
    Route::get('/', 'PagesController@show');

    Auth::routes();

    Route::get('contact', 'ContactsController@form')->name('contacts.form');
    Route::post('contact', 'ContactsController@send')->name('contacts.send');

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

        Route::get('contents/datatables', 'ContentsController@datatables')->name('admin.contents.datatables');
        Route::post('contents/bulk', 'ContentsController@bulk')->name('admin.contents.bulk');
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

        Route::get('contacts/datatables', 'ContactsController@datatables')->name('admin.contacts.datatables');
        Route::resource('contacts', 'ContactsController', [
            'names' => [
                'store' => 'admin.contacts.store',
                'index' => 'admin.contacts.index',
                'create' => 'admin.contacts.create',
                'destroy' => 'admin.contacts.destroy',
                'update' => 'admin.contacts.update',
                'show' => 'admin.contacts.show',
                'edit' => 'admin.contacts.edit',
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

    Route::get('/{slug}', 'ContentsController@show')->where('slug', '(?!elfinder\b)\b[a-z0-9-]+');
});