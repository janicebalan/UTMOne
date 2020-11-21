<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lectController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:lecturer|superadministrator');
    }
    
    public function index()
    {
        return view('lecturer.index');
    }
}
