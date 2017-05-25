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
    //Route::get('/', 'PagesController@show')->name('homepage');
    Route::get('/', 'ContentsController@show')->name('homepage');

    Auth::routes();

    Route::get('contact', 'ContactsController@form')->name('contacts.form');
    Route::post('contact', 'ContactsController@send')->name('contacts.send');

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogController@index')->name('blog.index');
        Route::get('/{pk}-{slug}', 'BlogController@show')->name('blog.show');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('{slug}', 'PagesController@show')->name('pages.show');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
        Route::get('/file-manager', 'FileManagerController@index')->name('admin.file_manager.index');

        //Route::post('contents/bulk', 'ContentsController@bulk')->name('admin.contents.bulk');
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

        Route::resource('settings', 'SettingsController', [
            'names' => [
                'store' => 'admin.settings.store',
                'index' => 'admin.settings.index',
                'create' => 'admin.settings.create',
                'destroy' => 'admin.settings.destroy',
                'update' => 'admin.settings.update',
                'show' => 'admin.settings.show',
                'edit' => 'admin.settings.edit',
            ]
        ]);
    });

    Route::get('/{path}', 'ContentsController@show')->where('path', '(?!elfinder\b)\b[a-z0-9-/]+')->name('contents.show');
});