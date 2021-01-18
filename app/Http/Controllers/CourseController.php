<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:administrator');
    // }

    // public function index()
    // {
    //     $product = DB::table('courses')->get();
    //    return view("admin.index", ['product' => $product]);
    // }

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

    public function assign(Request $request, $id)
    {
        $product = DB::table('courses')->where('id', $id)->first();
        $lecturersID= DB::table('role_user')->select('user_id')->where('role_id', 2)->get();
        $lecturers=DB::table('users')->select('name', 'username')->where('userID', 'like', '%LE%')->get();
        return view("admin.Course.assign", ['product' => $product, 'lecturers' => $lecturers]);
    }

    public function assigning(Request $request, $id1, $id2)
    {
        //$data= DB::table('users')->select('name')->where('id', $id1)->first();
        //$course = DB::table('courses')->where('id', $id)->update($data);

    }

    public function enroll( $id)
    {
        $user_id = auth()->user()->id;
        $product = DB::table('courses')->where('id', $id)->first();
        $data = array();
        $data['id'] = $product->id;
        $data['courseID'] = $product->courseID;
        $data['courseName'] = $product->courseName;
        $data['courseCapacity'] = $product->courseCapacity;
        $data['lecturerAssigned'] = $product->lecturerAssigned;
        $data['user_id'] = $user_id;

        $course = DB::table('courses')->insert($data);
        return redirect()->route('student')->with('success', 'Course Enrolled');

    }

    public function enrollpage()
    {

        $product = DB::table('courses')->where('user_id', 0)->get();
       return view("student.course.enrollmentpage", ['product' => $product]);
    }


    public function delete(Request $request, $id)
    {
        $course = DB::table('courses')->where('id', $id)->delete();
        return redirect()->route('admin')->with('success', 'Course Deleted');

    }

    public function view($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        return view('admin.Course.view', compact('course'));
    }

    public function lectview($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        return view('lecturer.course.view', ['course' => $course]);
    }

    public function studview($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        return view('student.viewCourse', ['course' => $course]);
    }

    public function editCourseWork($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        return view("lecturer.course.editCourseWork", ['course' => $course]);
    }

    public function updatecourseWork(Request $request, $id)
    {
        $data=array();
        $data['courseWork'] = $request->courseWork;


        $course = DB::table('courses')->where('id', $id)->update($data);
        return redirect()->route('lecturerCourse', $id)->with('success', 'Course Description Updated');
    }
}
