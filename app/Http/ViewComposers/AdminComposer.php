<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminComposer
{
    public function compose(View $view)
    {
        $adminMenu = [
            _i("Sites") => 'admin.sites',
            _i("Contents") => 'admin.contents',
            _i("Snippets") => 'admin.snippets',
            _i("Categories") => 'admin.categories',
            _i("Templates") => 'admin.templates',
            _i("Products") => 'admin.products',
            _i("Events") => 'admin.events',
            _i("Address books") => 'admin.address-books',
            _i("Offers") => 'admin.offers',
            _i("Prices") => 'admin.prices',
            //_i("Blog") => 'admin.blog',
            _i("Galleries") => 'admin.galleries',
            _i("Accordions") => 'admin.accordions',
            _i("Videos") => 'admin.videos',
            _i("Amenities") => 'admin.amenities',
            _i("Services") => 'admin.services',
            _i("Neighborhoods") => 'admin.neighborhoods',
            _i("Menus") => 'admin.menus',
            _i("Users") => 'admin.users',
            _i("Forms") => 'admin.forms',
            //_i("Contacts") => 'admin.contacts',
            _i("Bookings") => 'admin.bookings',
            _i("File manager") => 'admin.file-manager',
            _i("Currencies") => 'admin.currencies',
            _i("Newsletter emails") => 'admin.newsletter-emails',
            _i("Redirections") => 'admin.redirections',
            _i("Settings") => 'admin.settings',
            _i("Routes") => 'admin.routes',
        ];

        $view->with(compact('adminMenu'));
    }
}