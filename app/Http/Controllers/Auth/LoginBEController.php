<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginBEController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

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

    public function showLoginFormBE()
    {
        return view('backend.login');
    }

    public function loginBE(Request $request)
    {
        //$this->login($request);
        //return redirect()->route('Admin.Index');

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //dd(auth()->guard('admin')->user());
            return redirect()->route('Admin.Index');
        }else{
            return redirect()->route('Admin.LoginForm');
        }

    }

    public function logoutBE()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('Home');
    }
}
