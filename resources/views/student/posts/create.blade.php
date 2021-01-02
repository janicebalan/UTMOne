@extends('layouts.student')

@section('content')
<div class='container'><br>
<div class="card bg-info text-white">
        <div class="card-body" style='text-align:center' ><h1>New Submission</h1></div>
        
    </div>
    
    {!! Form::open(['route' =>['studStore', $task->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Details')}}
            {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Add submission details here'])}}
        </div>
        <div class="form-group">
            {{Form::file('fileupload')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    
    </div>
@endsection

