@extends('layouts.lecturer')
@section('content')



<br>
<div class='container'>
    <div class="card bg-info text-white">
        <div class="card-body" style='text-align:center' ><h1>Student Submissions List</h1></div>
    </div>

    
    <div class="card bg-light text-dark">
     <div class="card-body">
        <h2>Title: {{$task->taskTitle }}</h2>
        <h4>Details: {{$task->taskDetails}}</h4>
        <hr>
        <br>

        @if($post->isEmpty())
        <div class="alert alert-danger">No Submission </div>
        

        @else
        <table class="table table-bordered" style='table-layout:fixed;' >
            <thead class="thead-dark">
                <tr>
                <th scope="col" style='width:150px'>Student's Name</th>
                <th scope="col" style='width:160px'>Title</th>
                <th scope="col">Details</th>
                <th scope="col" style='width:160px'>Submit Date</th>
                <th scope="col" >File submission</th>
                </tr>
            </thead>
            <tbody>
           
            @foreach($post as $posts)
                <tr>
                    <td>{{$posts->user->name}} </td>
                    <td>{{$posts->title}} </td>
                    <td >{!!$posts->body!!} </td>
                    <td>{{$posts->updated_at}}  </td>
                    <td><a href="/storage/fileupload/{{$posts->fileupload}}">{{$posts->fileupload}}</a> </td>
                 </tr>
                
                 @endforeach
                 </tbody>
                 </table>
        @endif
     </div>
     </div>
    
</div>




@endsection