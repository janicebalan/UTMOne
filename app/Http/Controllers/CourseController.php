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
        try{
        $data = array();
        $data['courseID'] = $request->courseID;
        $data['courseName'] = $request->courseName;
        $data['courseCapacity'] = $request->courseCapacity;
        //$data['lecturerAssigned'] = $request->lecturerAssigned;

        $course = DB::table('courses')->insert($data);
        return redirect()->route('admin')->with('success', 'Course Added Successfully');
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin')->with('error', 'Please fill in the data required');
        }
        
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
        //$data['lecturerAssigned'] = $request->lecturerAssigned;

        $course = DB::table('courses')->where('id', $id)->update($data);
        return redirect()->route('admin')->with('success', 'Course Info Updated');
    }

    public function assign(Request $request, $id)
    {
        $product = DB::table('courses')->where('id', $id)->first();
        $lecturersID= DB::table('role_user')->select('user_id')->where('role_id', 2)->get();
        $lecturers=DB::table('users')->select('id', 'name', 'username')->where('userID', 'like', '%LE%')->get();
        return view("admin.Course.assign", ['product' => $product, 'lecturers' => $lecturers]);
    }

    public function assigning(Request $request, $id1, $id2, $name)
    {
        try{
        $lectID= $id1;
        $courseID=$id2;
        $data= Course::find($courseID);
        $data->lecturerAssigned = $name;
        $data->save();
        $user_id = $lectID;
        $product = DB::table('courses')->where('id', $courseID)->first();
        $data = array();
        $data['id'] = $product->id;
        $data['courseID'] = $product->courseID;
        $data['courseName'] = $product->courseName;
        $data['courseCapacity'] = $product->courseCapacity;
        $data['lecturerAssigned'] = $product->lecturerAssigned;
        $data['user_id'] = $user_id;
        $course = DB::table('courses')->insert($data);
        return redirect()->route('admin')->with('success', 'Lecturer Assigned Successfully');
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin')->with('error', 'This lecturer is already assigned.');
        }

    }

    public function unassigning(Request $request, $id2)
    {
        $courseID=$id2;
        $name = DB::table('courses')->where('id', $id2)->value('lecturerAssigned');

        if($name == null)
        {
            return redirect()->route('admin')->with('error', 'There is no lecturer assigned.');
        }

        else{
            $course = DB::table('courses')->where('id', $id2)->where('user_id', '<>', 0)->delete();
            $data= Course::find($id2);
            $data->lecturerAssigned = null;
            $data->save();
            return redirect()->route('admin')->with('success', 'Lecturer Unassigned');
        }
    }

    public function enroll( $id)
    {
        try{
        $numreg = DB::table('courses')->where('id', $id)->where('user_id', 0)->pluck('registered');
        $numcap = DB::table('courses')->where('id', $id)->where('user_id', 0)->pluck('courseCapacity');


        if($numreg<$numcap)
        {
            $regNum=DB::table('courses')->where('id', $id)->where('user_id', 0)->update(['registered' => DB::raw('registered + 1')]);
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

        elseif($numreg>=$numcap){
            return redirect()->route('student')->with('error', 'Course is full');
        }
        
        }

         catch(\Exception $e)
        {
             return redirect()->route('student')->with('error', 'You have already enrolled in this course');
        }
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

    public function viewStudents($id)
    {
        $students=DB::table('users')->select('name', 'userID', 'email')->where('userID', 'like', '%ST%')->join('courses', 'courses.user_id', '=', 'users.id')->where('courses.id', $id)->get();



        return view("lecturer.course.viewStudents", ['students' => $students]);
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
