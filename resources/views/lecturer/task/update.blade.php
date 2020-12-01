@extends('layouts.lecturer')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Tasks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/lecturer')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Update Tasks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     <section class="content">
      <div class="container-fluid">
        <form method= "post" action="{{route ('lecturer.tasks.update', $task->id)}}">
        {{ method_field('PUT') }}
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">

                <div class="row">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-6"><input type="text" name="taskTitle" class="form-control" value="{{$task->taskTitle }}"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <label class="col-md-3">Details</label>
                    <div class="col-md-6"><input type="text" name="taskDetails" class="form-control" value="{{$task->taskDetails }}"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <label class="col-md-3">Number of Files</label>
                    <div class="col-md-6"><input type="number" name="taskNo" class="form-control" value="{{$task->taskNo }}"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <label class="col-md-3">Type of Files</label>
                    <div class="col-md-6"><input type="text" name="taskType" class="form-control" value="{{$task->taskType }}"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <label class="col-md-3">Due Date</label>
                    <div class="col-md-6"><input type="datetime-local" name="taskDue" class="form-control" value="{{ $task->taskDue}}"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
      </div>
      </section>

@endsection