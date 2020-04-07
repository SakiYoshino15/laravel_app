<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    //オーセンティケイツユーザー　認証するユーザー

    // protected $maxAttempts = 2;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/todo';
    protected $maxAttempts = 3;
    //Attempts 試みる
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
        //middleware('guest')ログインしていない人をはじいていて、except()は引数に指定した一部の除。routelistにあるnameを指定してその時だげ、ミドルウェアを設定していない
    }
    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}
