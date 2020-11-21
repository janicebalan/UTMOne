<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student|superadministrator');
    }
    
    public function index()
    {
        return view('lecturer.student');
    }
}
