@extends('layouts.lecturer')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Tasks</b></h1>
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
      <div class="card-body">
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
        <th colspan="2">Action</th>
        <th>View Submissions</th>
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
        </td>
        <td>  
          <form action="{{route('lecturer.tasks.destroy', $t->id) }}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type='submit' name="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
        <td> <a href="{{route('studTaskLists', $t->id) }}" class="btn btn-info">View Students</a></td>
      </tr>
      @endforeach
      </table>
      </div>
      </div>
      </section>
@endsection
