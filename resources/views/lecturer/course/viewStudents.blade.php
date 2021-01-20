@extends('layouts.lecturer')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>Student's name</th>
        <th>Student's ID</th>
        <th>Email</th>
    </tr>

    @foreach($students as $student)
                      <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->userID}}</td>
                        <td>{{$student->email}}</td>

                      </tr>

                      @endforeach()
</table>



@endsection
