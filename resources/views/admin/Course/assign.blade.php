@extends('layouts.admin')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Lecturer Assigned</th>
    </tr>
    @foreach($product as $courses)
    <tr>

      <td>{{$courses->courseID}}</td>
      <td>{{$courses->courseName}}</td>
      <td>{{$courses->lecturerAssigned}}</td>
      <td>
      <a class="btn btn-info" href="{{URL::to('view/courses/'.$courses->id)}}">Show</a>
          <a class="btn btn-primary" href="{{URL::to('edit/courses/'.$courses->id)}}">Edit</a>
          <a class="btn btn-danger" href="{{URL::to('delete/courses/'.$courses->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
      </td>

    </tr>
    @endforeach()
</table>
@endsection
