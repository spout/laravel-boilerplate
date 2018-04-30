<?php

if (php_sapi_name() !== 'cli') {
    $redirections = Cache::remember('redirections', 60, function () {
        return \App\Models\Redirection::all();
    });

    foreach ($redirections as $redirection) {
        Route::domain($redirection->domain)->group(function () use ($redirection) {
            Route::redirect($redirection->url, $redirection->destination, 301);
        });
    }
}

Route::group(['prefix' => \LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function () {
    //Route::get('/', 'PagesController@show')->name('homepage');
    Route::get('/', 'ContentsController@show')->name('homepage');

    Auth::routes();
    Route::group(['prefix' => 'login'], function () {
        Route::get('{provider}', 'Auth\LoginController@redirectToProvider')->name('socialite.login');
        Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');
    });

    Route::get('contact', 'ContactsController@form')->name('contacts.form');
    Route::post('contact', 'ContactsController@send')->name('contacts.send');

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogController@index')->name('blog.index');
        Route::get('/{pk}-{slug}', 'BlogController@show')->name('blog.show');
    });

    $allowedCommands = ['properties'];
    Route::get('artisan/{command}', function ($command) {
        $exitCode = Artisan::call($command);
        return response()->json(compact('exitCode'));
    })->where('command', implode('|', $allowedCommands));

    Route::get('sitemap.{ext}', 'SitemapController@index')->where('ext', '^(' . implode('|', array_keys(config('sitemap.types'))) . ')$')->name('sitemap');

    Route::group(['prefix' => 'pages'], function () {
        Route::get('{path}', 'PagesController@show')->where('path', '[a-z0-9-/]+')->name('pages.show');
    });

    Route::group(['prefix' => 'map'], function () {
        Route::match(['get', 'post'], '/', 'MapController@index')->name('map.index');
        Route::match(['get', 'post'], 'markers', 'MapController@markers')->name('map.markers');
    });

    Route::group(['prefix' => 'reserve'], function () {
        Route::match(['get', 'post'], '/', 'ReserveController@index')->name('reserve.index');
    });

    Route::group(['prefix' => 'forms'], function () {
        Route::post('/', 'FormsController@store')->name('forms.store');
    });

    Route::group(['prefix' => 'favorites'], function () {
        Route::get('/', 'FavoritesController@index')->name('favorites.index');
        Route::post('store', 'FavoritesController@store')->name('favorites.store');
        Route::post('destroy', 'FavoritesController@destroy')->name('favorites.destroy');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
        Route::get('/file-manager', 'FileManagerController@index')->name('admin.file-manager.index');
        Route::get('/routes', 'RoutesController@index')->name('admin.routes.index');
        Route::resource('contents', 'ContentsController', ['names' => route_resource_names('admin.contents.{name}')]);
        Route::resource('contacts', 'ContactsController', ['names' => route_resource_names('admin.contacts.{name}')]);
        Route::resource('blog', 'BlogController', ['names' => route_resource_names('admin.blog.{name}')]);
        Route::resource('categories', 'CategoriesController', ['names' => route_resource_names('admin.categories.{name}')]);
        Route::group(['prefix' => 'menus'], function () {
            Route::match(['get', 'post'], 'tree-data/{pk}', 'MenusController@treeData')->name('admin.menus.tree-data');
            Route::post('tree-save', 'MenusController@treeSave')->name('admin.menus.tree-save');
            Route::post('tree-destroy', 'MenusController@treeDestroy')->name('admin.menus.tree-destroy');
        });
        Route::resource('menus', 'MenusController', ['names' => route_resource_names('admin.menus.{name}')]);
        Route::resource('users', 'UsersController', ['names' => route_resource_names('admin.users.{name}')]);
        Route::resource('snippets', 'SnippetsController', ['names' => route_resource_names('admin.snippets.{name}')]);
        Route::resource('settings', 'SettingsController', ['names' => route_resource_names('admin.settings.{name}')]);
        Route::resource('galleries', 'GalleriesController', ['names' => route_resource_names('admin.galleries.{name}')]);
        Route::resource('events', 'EventsController', ['names' => route_resource_names('admin.events.{name}')]);
        Route::resource('currencies', 'CurrenciesController', ['names' => route_resource_names('admin.currencies.{name}')]);
        Route::group(['prefix' => 'forms'], function () {
            Route::post('preview', 'FormsController@preview')->name('admin.forms.preview');
        });
        Route::resource('forms', 'FormsController', ['names' => route_resource_names('admin.forms.{name}')]);
        Route::resource('offers', 'OffersController', ['names' => route_resource_names('admin.offers.{name}')]);
        Route::resource('products', 'ProductsController', ['names' => route_resource_names('admin.products.{name}')]);
        Route::resource('prices', 'PricesController', ['names' => route_resource_names('admin.prices.{name}')]);
        Route::resource('redirections', 'RedirectionsController', ['names' => route_resource_names('admin.redirections.{name}')]);
        Route::resource('sites', 'SitesController', ['names' => route_resource_names('admin.sites.{name}')]);
        Route::resource('accordions', 'AccordionsController', ['names' => route_resource_names('admin.accordions.{name}')]);
        Route::resource('address-books', 'AddressBooksController', ['names' => route_resource_names('admin.address-books.{name}')]);
        Route::group(['prefix' => 'newsletters'], function () {
            Route::get('export', 'NewslettersController@export')->name('admin.newsletters.export');
        });
        Route::resource('newsletters', 'NewslettersController', ['names' => route_resource_names('admin.newsletters.{name}')]);
    });

    Route::group(['namespace' => 'Advertiser', 'prefix' => 'advertiser'], function () {
        Route::get('/', 'DashboardController@index')->name('advertiser.dashboard.index');
        Route::get('products/{slug?}', 'ProductsController@index')->name('advertiser.products.index');
    });

    if (php_sapi_name() !== 'cli') {
        $categories = Cache::remember('categories', 60, function () {
            return \App\Models\Category::all();
        });

        $slugsPlural = [];
        $slugsSingular = [];
        foreach ($categories as $category) {
            $slugsPlural[] = $category->slug_plural;
            $slugsSingular[] = $category->slug_singular;
        }

        $categorySlugPluralWhere = '^(' . implode('|', $slugsPlural) . ')$';
        $categorySlugSingularWhere = '^(' . implode('|', $slugsSingular) . ')$';

        Route::get('/{category_slug_plural}', 'ProductsController@index')->where('category_slug_plural', $categorySlugPluralWhere)->name('products.index');
        Route::get('/{category_slug_singular}/{slug}', 'ProductsController@show')->where('category_slug_singular', $categorySlugSingularWhere)->name('products.show');
    }

    Route::get('/{path}', 'ContentsController@show')->where('path', '^(?!(elfinder|imagecache)\b)\b[a-z0-9-\/]+')->name('contents.show');
});

Route::group(['prefix' => 'elfinder'], function () {
    Route::get('/',  ['as' => 'elfinder.index', 'uses' =>'ElfinderController@showIndex']);
    Route::get('popup-custom/{input_id}', ['as' => 'elfinder.popup-custom', 'uses' => 'ElfinderController@showPopup']);
});

Route::get('/manifest.json', 'ManifestController@index');
