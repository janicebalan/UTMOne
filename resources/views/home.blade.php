@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <p style="text-align:center">**Only administrators will be able to create an account for new users**</p>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <a class="nav-link" href="{{ route('register') }}">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create a new user') }}   
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
