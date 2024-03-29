<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        $product = DB::table('courses')->where('user_id', 0)->get();
       return view("admin.index", ['product' => $product]);
    }
}
