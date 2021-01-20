@extends('layouts.lecturer')

@section('content')
<html>
    <head>
        <title>Catalog Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css-coursedetail/styles.css">
        <link rel ="stylesheet" type="type/css" href="/css-coursedetail/boostrap.min.css">
        <link rel="stylesheet" href="/css-coursedetail/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="/css-coursedetail/bootstrap.min.css" type="text/css">




    </head>

    <body>
        <div class='container'>
            <div class="card bg-info text-white">
                <div class="card-body" style='text-align:center' ><h1>{{$course->courseName}}</h1></div>
            </div>
            <a href="{{route('lecturer.tasks.index')}}" class="btn btn-info float-left" role="button" >View Tasks</a>

            <a href="{{URL::to('viewstudents/courses/'.$course->id)}}" class="btn btn-info float-left" role="button" style="margin-left: 20px;">View Students</a>
            <br>
            <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif


            <div class="card bg-light text-dark">
             <div class="card-body">
                <h2> Course Work </h2>
                <p>{{$course->courseWork}}
                <a  class="btn btn-primary float-right" role="button" href="{{URL::to('/lecturer/edit/courseWork/'.$course->id)}}">Edit</a></p>
             </div>
             </div>


        </div>

        {{-- <div class="card-body">
            <h1 style="text-align:center;" >{{$course->courseName}}</h1>
            <h3 style="text-align:center;">Lecturer: {{$course->lecturerAssigned}}</h3>

          </div>


          <div class="card text-left" style="background-color: lightcyan;">
            <h2>Week 1</h2>
            <form  class="login_form" >

                <input type="submit" name="addtask" value="Add Task">
            </form>

        </div> --}}
    </body>



</html>




@endsection
