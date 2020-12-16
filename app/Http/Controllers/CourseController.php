<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        $product = DB::table('courses')->get();
       return view("admin.index", ['product' => $product]);
    }

    public function Store(Request $request)
    {
        $data = array();
        $data['courseID'] = $request->courseID;
        $data['courseName'] = $request->courseName;
        $data['courseCapacity'] = $request->courseCapacity;
        $data['lecturerAssigned'] = $request->lecturerAssigned;

        $course = DB::table('courses')->insert($data);
        return redirect()->route('admin')->with('success', 'Course Added Successfully');
    }

    public function edit($id)
    {
        $product = DB::table('courses')->where('id', $id)->first();
        return view("admin.Course.edit", ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['courseID'] = $request->courseID;
        $data['courseName'] = $request->courseName;
        $data['courseCapacity'] = $request->courseCapacity;
        $data['lecturerAssigned'] = $request->lecturerAssigned;

        $course = DB::table('courses')->where('id', $id)->update($data);
        return redirect()->route('admin')->with('success', 'Course Info Updated');
    }

    public function delete(Request $request, $id)
    {
        $course = DB::table('courses')->where('id', $id)->delete();
        return redirect()->route('admin')->with('success', 'Course Deleted');
    }
}