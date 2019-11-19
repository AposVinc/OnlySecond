<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;

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

    protected $guard = 'user'; //?

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'Home';

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
        return view('frontend.auth');
    }

    public function loginFE(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if($request->session()->has('products')){
                $quantity = $request->session()->get('quantity');
                foreach ($request->session()->get('products') as $k => $p){
                    if (\Auth::user()->products()->where('cod', $p->cod)->first()) {
                        $cart = Cart::where('product_id', $p->id)->where('user_id', \Auth::id())->first();
                        \Auth::user()->products()->where('cod', $p->cod)->update(['quantity' => $cart->quantity + $quantity[$k]]);
                    }else{
                        \Auth::user()->products()->save($p, ['quantity'=> $quantity[$k]]);
                    }
                }
            }
            $request->session()->forget(['products', 'quantity', 'TotalPrice']);
            return redirect()->route('Home');
        } else {
            return back();
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('Home');
    }
}
