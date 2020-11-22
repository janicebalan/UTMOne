<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user|administrator');
    }
    
    public function index()
    {
        return view('user.index');
    }
}
