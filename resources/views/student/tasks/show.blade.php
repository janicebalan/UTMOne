@extends('layouts.student')

@section('content')

<br>
<div class='container'>
    <div class="card bg-info text-white">
        <div class="card-body" style='text-align:center' ><h1>Assignment Details</h1></div>
    </div>

    
    <div class="card bg-light text-dark">
     <div class="card-body">
        <h2> {{$task->taskTitle }}</h2>
        <hr>
        <br>
        <p>{{$task->taskDetails}}</p>
        <p>Number of files to be submitted: <b>{{$task->taskNo}}</b></p>
        <p>Type of document to be submitted:<b> {{$task->taskType}}</b></p>
        
        <p>Due Date: <b> {{$task->formatted_date}}</b></p><br>

        

        @if($post->isEmpty())
        <div class="col-sm-6" style="background-color:lightblue; text-align:center; margin:auto;" > <h5><b>{{$task->calculateDue()}}</h5></div>
        <br>
        <a href="{{route('studCreate', $task->id)}}" class="btn btn-info float-right " role="button">Submit Task</a>
        

        @else
            @foreach($post as $posts)
            <div class="card bg-success text-white">
                <div class="card-body" style="text-align:center"><h5> Assignment Submitted</h5></div>
            </div>
            <hr><hr>
            <h3><b>Submission Details</b></h3>
            <p><b>Title:</b> {{$posts->title}}<p>
            <p><b>Details: </b> {!!$posts->body!!}<p>
            <p><b>Uploaded on</b> {{$posts->created_at}} by {{$posts->user->name}}</p>
            <p[><b>File Submitted: </b></p>
            <div class="card bg-light mb-3" >
                 <div class="card-header"><a href="/storage/fileupload/{{$posts->fileupload}}">{{$posts->fileupload}}</a></div>
             </div>
                <hr>
                 @if(!Auth::guest())
                    @if(Auth::user()->id == $posts->user_id)
                         <a href="{{route('studEdit', $posts->id)}}" class="btn btn-primary">Edit Submission</a> <br><br>

                         {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                         {{Form::submit('Delete Submission', ['class' => 'btn btn-danger' , 'onclick' => 'return confirm("Are you sure you want to delete?")'])}}
                         {!!Form::close()!!}
                    @endif
                 @endif
                 @endforeach
        @endif
     </div>
     </div>
    
</div>
      
      
       
@endsection