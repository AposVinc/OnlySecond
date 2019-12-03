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

    public function showLoginForm()
    {
        return view('backend.login');
    }

    public function loginBE(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('Admin.Index');
        }else{
            return redirect()->route('Admin.LoginForm')->with('error','Email e/o Password errati!!! Riprova!!!');
        }
    }

    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('Home');
    }
}
