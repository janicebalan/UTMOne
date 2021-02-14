@extends('layouts.lecturer')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Course</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-4">
          <!-- small box -->
          <div class="small-box ">
          <img src="{{asset ('dist/img/utmlogo.png')}}" alt="UTM Logo" width="300px" height="100px">
          </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-8 col-6" >
          <!-- small box -->
          <div class="small-box" style="background-color:#056099">
          <div class="container" style="padding: 5px 50px 5px 20px" >
            <h1 style="font-size:70px; color:white"> Welcome to UTMOne </h1>
          </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{$message}}</p>
              </div>
          @endif

          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{$message}}</p>
              </div>
          @endif



          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Courses
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Course Capacity</th>
                        <th>Registered Students</th>
                        <th>Lecturer Assigned</th>
                        <th>Action</th>
                    </tr>
                    @foreach($product as $courses)
                    <tr>

                      <td>{{$courses->courseID}}</td>
                      <td>{{$courses->courseName}}</td>
                      <td>{{$courses->courseCapacity}}</td>
                      <td>{{$courses->registered}}</td>
                      <td>{{$courses->lecturerAssigned}}</td>
                      <td>
                      <a class="btn btn-info" href="{{URL::to('/lecturer/view/courses/'.$courses->id)}}">Show</a>

                      </td>

                    </tr>
                    @endforeach()
                </table>

              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->



        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="col-lg-5">

          <!-- Map card -->
          <div class="card bg-gradient-primary" style="display: none;">
            <!-- /.card-body-->
            <div class="card-footer bg-transparent" style="display: none;">
              <div class="row">
                <div class="col-4 text-center">
                  <div id="sparkline-1" style="display: none;"></div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-2" style="display: none;"></div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-3" style="display: none;"></div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card -->



          <!-- Calendar -->
          <div class="card bg-gradient-success">
            <div class="card-header border-0">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                    <i class="fas fa-bars"></i></button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
