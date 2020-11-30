<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); /*check user login or not*/
    }

    public function index()
    {
        
        $tasks = DB::table('task')->get();
        return view('lecturer.task.index', ['tasks'=> $tasks]);
    }
    public function detail($id){

        $task = DB::table('task')->find($id);
        echo $task->taskTitle;
    }
}
