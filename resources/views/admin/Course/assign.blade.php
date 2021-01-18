@extends('layouts.admin')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Lecturer Assigned</th>
    </tr>
    <tr>

      <td>{{$product->courseID}}</td>
      <td>{{$product->courseName}}</td>
      <td>{{$product->lecturerAssigned}}</td>
    </tr>
</table>


<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Username</th>
</tr>
                    @foreach($lecturers as $lecturers)
                      <tr>
                        <td>{{$lecturers->name}}</td>
                        <td>{{$lecturers->username}}</td>
                        <td>
                        <a class="btn btn-info" href="{{URL::to('assigning/courses/'.$lecturers->id .$prdouct->id)}}">Assign</a>
                        </td>

                      </tr>

                      @endforeach()
                    </table>
@endsection
