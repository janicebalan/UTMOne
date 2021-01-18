@extends('layouts.lecturer')
@section('content')

br>
<div class='container'>
    <div class="card bg-info text-white">
        <div class="card-body" style='text-align:center' ><h1>Grading Tasks</h1></div>
    </div>

    
    <div class="card bg-light text-dark">
     <div class="card-body">
        <h2>Title: {{$task->taskTitle }}</h2>
        <hr>
        <br>

        
        
        <table class="table table-bordered" style='table-layout:fixed;' >
            <thead class="thead-dark">
                <tr>
                <th scope="col" style='width:300px'>Student's Name</th>
                <th scope="col" >File submission</th>
                <th scope="col"style='width:150px' >Grade (A,B,C,D,E)</th>
                </tr>
                <form method= "post" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($post as $posts)
                <tr>
                    <td>{{$posts->user->name}} </td>
                    <td><a href="/storage/fileupload/{{$posts->fileupload}}">{{$posts->fileupload}}</a> </td>
                    <td> 
                    <form method= "post" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="grade" style="width:50px">
                        <input type="submit" class="btn btn-info" value="Save">
                 </form>
                    </td>
                 </tr>
                 @endforeach
                 
            </thead>
            <tbody>
           
           
                 </tbody>
                 </table>
       
     </div>
     </div>
    
</div>





@endsection