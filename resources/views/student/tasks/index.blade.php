@extends('layouts.student')

@section('content')
<br>
<div class='container'>
    <div class="card bg-info text-white">
        <div class="card-body" style='text-align:center' ><h1>List of Assignments</h1></div>
    </div>

    @foreach($tasks as $t)
    <div class="card bg-light text-dark">
     <div class="card-body">
        <h2> {{$t->taskTitle}}</h2>
        <p>{{$t->taskDetails}}
        <a href="{{route('studTaskDetails',$t->id)}}" class="btn btn-primary float-right" role="button">View More</a></p>
     </div>
     </div>
    @endforeach
</div>
      
      
       
@endsection