@extends('layouts.admin')

@section('content')

<br>
<div>
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Update & Delete') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">UserID</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->userID }}</td>
                                <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
                                <td><a href = 'delete/{{ $user->id }}'>Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

