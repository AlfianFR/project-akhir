<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->role == "admin") {
    //             return redirect('petugas/dashboard');
    //         }
    //         elseif (auth()->user()->role == "user") {
    //             return redirect('/share');}
    //         //      else {
    //         //     return redirect()->route('index');
    //         // }
    //     } else {
    //         return redirect('login-user')
    //             ->with('error', 'Email-Address And Password Are Wrong.');
    //     }

    // }

    public function authenticated(){
        if(Auth::user()->role == 'admin'){
            return redirect('admin/dashboard/');
        } else {
            return redirect('/share');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}