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

    public function showLoginForm()
    {
        //return view('auth.login');
        return view('login1');
    }

    public function showLoginFormBE()
    {
        return view('backend.login');
    }

    public function loginFE(Request $request)
    {
        $this->login($request);
        return redirect()->route('Home');
    }


    public function loginBE(Request $request)
    {
        $this->login($request);
        return redirect()->route('Admin.Index');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->to('/home');
    }

}
