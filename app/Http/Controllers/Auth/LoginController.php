<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    //by default, laravel uses email to auth, this function is to change email to username
    public function username()
    {
        return 'username';
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('administrator')){
            return redirect('admin');
        }
        if($user->hasRole('user')){
            return redirect('user');
        }
        if($user->hasRole('student')){
            return redirect('student');
        }
        if($user->hasRole('lecturer')){
            return redirect('lecturer');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
