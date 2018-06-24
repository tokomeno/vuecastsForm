<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGithub()
    {

        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGithub()
    {
        $gitUser = Socialite::driver('github')->user();

        $databaseUser = User::CreateOrFindSocialLogin($gitUser);

// 
        // dd($databaseUser);

        Auth::login($databaseUser);

        return redirect('/');

        // $user->token;
    }



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderFb()
    {

        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackFb()
    {
        $fbUser = Socialite::driver('facebook')->user();

        $databaseUser = User::CreateOrFindSocialLogin($fbUser);

// dd($fbUser);
        // dd($databaseUser);

        Auth::login($databaseUser);

        return redirect('/');

        // $user->token;
    }
}
