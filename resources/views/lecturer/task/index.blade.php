@extends('layouts.lecturer')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tasks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/lecturer')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Tasks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
      <p>
      <a href="{{ route('lecturer.tasks.create') }}" class="btn btn-primary">Assign New Task</a>
      </p>
      <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Details</th>
        <th>Number of Files</th>
        <th>Type of Files</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
      @foreach($tasks as $t)
      <tr>
        <td>{{$t->id}}</td>
        <td>{{$t->taskTitle}}</td>
        <td>{{$t->taskDetails}}</td>
        <td>{{$t->taskNo}}</td>
        <td>{{$t->taskType}}</td>
        <td>{{$t->taskDue}}</td>
        <td>
          <a href="{{route('lecturer.tasks.edit',$t->id)}}" class="btn btn-info">Update</a> 
          <a href="javascript:void(0)" onclick="$('input[type=hidden]').closest('form')" class="btn btn-danger">Delete</a>
          <form action="{{route('lecturer.tasks.destroy', $t->id) }}" method="post">
          @method('DELETE')
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          </form>
        </td>
      </tr>
      @endforeach
      </table>
      </div>
      </section>
@endsection
