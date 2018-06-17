<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use Illuminate\View\View;

class UserListComposer
{
    public function compose(View $view)
    {
        $userList = User::all()->pluck('fullname', 'id')->prepend('-', '');
        $view->with('userList', $userList);
    }
}