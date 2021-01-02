<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;

class lectController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:lecturer|administrator');
    }

    public function index()
    {
        $product = DB::table('courses')->get();
       return view("lecturer.index", ['product' => $product]);
    }
}
