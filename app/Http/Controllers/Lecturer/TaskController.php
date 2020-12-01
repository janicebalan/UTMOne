<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); /*check user login or not*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('task')->get();
        return view('lecturer.task.index', ['tasks'=> $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::today();

        $validatedData= $request->validate(['taskTitle'=>['required','max:255'],
        'taskDetails' =>['required'],
        'taskNo' =>['required'],
        'taskType' =>['required'],
        'taskDue' =>['required', 'after_or_equal:'.$today],
        ]);

        $task = new Task;
        $task->taskTitle = $request->taskTitle;
        $task->taskDetails = $request->taskDetails;
        $task->taskNo = $request->taskNo;
        $task->taskType = $request->taskType;
        $task->taskDue = $request->taskDue;

        $task->save();
       
        return redirect()->route ('lecturer.tasks.index')->with('success','Assign new task successfully!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $arr['task'] = $task;
        return view('lecturer.task.update')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $today = Carbon::today();
        $validatedData= $request->validate(['taskTitle'=>['required','max:255'],
        'taskDetails' =>['required'],
        'taskNo' =>['required'],
        'taskType' =>['required'],
        'taskDue' =>['required','after_or_equal:'.$today],
        ]);


        $task->taskTitle = $request->taskTitle;
        $task->taskDetails = $request->taskDetails;
        $task->taskNo = $request->taskNo;
        $task->taskType = $request->taskType;
        $task->taskDue = $request->taskDue;

        $task->save();
        return redirect()->route ('lecturer.tasks.index')->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from task where id = ?',[$id]);
        return redirect()->route ('lecturer.tasks.index');

        
    }
    
}
