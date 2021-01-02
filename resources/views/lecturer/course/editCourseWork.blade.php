@extends('layouts.lecturer')

@section('content')
<h2>Update Course Work Description </h2>
<form method="POST" enctype="multipart/form-data" action="{{ url('/lecturer/update/courseWork/'.$course->id) }}">
    @csrf
    <div class="card-body">
        <input type="text" name="courseWork" style="min-height:200px; min-width:500px" value="{{$course->courseWork}}">
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection
