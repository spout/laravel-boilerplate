<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\Response
     * @link https://scotch.io/tutorials/laravel-social-authentication-with-socialite
     */
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        $user = \Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        \Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user else, create a new user object.
     *
     * @param  $user \Socialite user object
     * @param $provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
