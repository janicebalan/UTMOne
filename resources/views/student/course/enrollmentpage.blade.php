@extends('layouts.student')
@section('content')


<table class="table table-bordered">
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Course Capacity</th>
        <th>Lecturer Assigned</th>
        <th>Action</th>
    </tr>


@foreach($product as $courses)
     <tr>
<td>{{$courses->courseID}}</td>
<td>{{$courses->courseName}}</td>
<td>{{$courses->courseCapacity}}</td>
<td>{{$courses->lecturerAssigned}}</td>
<td>
    <a class="btn btn-info" href="{{URL::to('/student/enroll/courses/'.$courses->id)}}">Enroll</a>
</td>

                    </tr>
                    @endforeach()
                </table>


@endsection
