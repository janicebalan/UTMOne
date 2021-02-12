<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use App\Task;
use Illuminate\Support\Facades\DB;

use Faker\Provider\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts= Post::all();

        //$posts = Post::orderBy('title','asc')->get();
        //$posts = Post::where('collumn', 'data');

       // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title','asc')->take(1)->get(); only showing 1 data
        $user_id = auth()->user()->id;
        //$user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->get();
        //$posts = Post::orderBy('created_at','desc'); //show 10 post per page
        return view('student.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('student.posts.create');
    }

    public function create2($id)
    {
        $task = Task::find($id);
        return view('student.posts.create',  ['task'=> $task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'fileupload' => 'required|mimes:csv,txt,xlx,xls,pdf,zip,jpeg,png,jpg,docx|max:2048'
        ]);

        // Handle File Upload
        if($request->hasFile('fileupload')){
            // Get filename with the extension
            $filenameWithExt = $request->file('fileupload')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fileupload')->getClientOriginalExtension();
            // Filename to store //so wont override
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload File
            $path = $request->file('fileupload')->storeAs('public/fileupload', $fileNameToStore);
		
	    // make thumbnails
	    //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('fileupload')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/fileupload/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->user_id = auth()->user()->id;
        $posts->fileupload = $fileNameToStore;
        $posts->save();


        $task = Task::find($id);
        $user_id = auth()->user()->id;
        $post = Post::where('user_id', $user_id)->get();
        return view('student.tasks.show', compact('task', 'post'));
        
    }

    public function store2(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'fileupload' => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('fileupload')){
            // Get filename with the extension
            $filenameWithExt = $request->file('fileupload')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fileupload')->getClientOriginalExtension();
            // Filename to store //so wont override
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload File
            $path = $request->file('fileupload')->storeAs('public/fileupload', $fileNameToStore);
		
	    // make thumbnails
	    //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('fileupload')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/fileupload/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->user_id = auth()->user()->id;
        $posts->task_id = $id;
        $posts->fileupload = $fileNameToStore;
        $posts->save();

        return app('App\Http\Controllers\Lecturer\TaskController')->show($id);
        //$task = Task::find($id);s
        //$task_id = $task->id;
        //$user_id = auth()->user()->id;
       // $post = Post::where(['user_id'=> $user_id, 'task_id' => $task_id])->get();
        
       // $post = Post::where('user_id', $user_id)->get();
        //return view('student.tasks.show', compact('task', 'post'));
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('student.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('student.posts.edit')->with('post', $post);
    }

    public function edit2($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('student.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
		$post = Post::find($id);
         // Handle File Upload
        if($request->hasFile('fileupload')){
            // Get filename with the extension
            $filenameWithExt = $request->file('fileupload')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fileupload')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('fileupload')->storeAs('public/fileupload', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/fileupload/'.$post->fileupload);
		
	   //Make thumbnails
	    //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('fileupload')->getRealPath());
            //$thumb->resize(80, 80);
           // $thumb->save('storage/fileupload/'.$thumbStore);
		
        }

        // Update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('fileupload')){
            $post->fileupload = $fileNameToStore;
        }
        $post->save();

        $task_id = $post->task_id;

        return app('App\Http\Controllers\Lecturer\TaskController')->show($task_id)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->fileupload != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/fileupload/'.$post->fileupload);
        }
        
        $post->delete();
        $task_id = $post->task_id;
        return app('App\Http\Controllers\Lecturer\TaskController')->show($task_id)->with('success','Deleted successfully!');
    }
    }

