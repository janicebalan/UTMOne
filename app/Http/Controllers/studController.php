<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use Illuminate\Support\Facades\DB;

class studController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student|administrator');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $product = DB::table('courses')->where('user_id', $user_id)->get();
       return view("student.index", ['product' => $product]);
    }
}
