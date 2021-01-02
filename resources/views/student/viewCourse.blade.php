@extends('layouts.student')

@section('content')
<html>
    <head>
        <title>Course Page</title>
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
            <a href="#" class="btn btn-info float-left" role="button">View Tasks</a></p>
            <br>
            <br>
            <div class="card bg-light text-dark">
                <div class="card-body">
                   <h2> Class Work </h2>
                   <p>{{$course->courseWork}}

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
