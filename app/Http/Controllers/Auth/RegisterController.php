<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /*
    protected $redirectTo = RouteServiceProvider::HOME;
    */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            /*
            'userID' => ['required', 'string', 'max:10'],
            'username' => ['required', 'string', 'min:6', 'unique:users'],
            */
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'userID' => $data['userID'],
            'password' => Hash::make($data['password']),

        ]); 
       
        $roles= $_POST ['roles'];
        echo 'The role chosen is ' . $roles;
        
        if($roles == 'administrator'){ 
            $user->attachRole('administrator');
        }
        else if($roles == 'lecturer') {
            $user->attachRole('lecturer');
        }
        else if($roles == 'student'){ 
            $user->attachRole('student');
        }  
        else{
            $user->attachRole('user');
        }

        return $user;
    }
}
