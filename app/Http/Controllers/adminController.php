<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administratrator');
    }
    
    public function index()
    {
        return view('admin.index');
    }
}
