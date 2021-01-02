<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class studController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student|administrator');
    }
    
    public function index()
    {
        
        return view('student.index');
    }
}
