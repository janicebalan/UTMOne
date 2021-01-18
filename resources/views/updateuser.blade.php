@extends('layouts.admin')

@section('content')

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update User Details') }}</div>

                <div class="card-body">
                    <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
                        
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <table>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value = '<?php echo$users[0]->name; ?>'/> 
 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value = '<?php echo$users[0]->email; ?>'/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value = '<?php echo$users[0]->username; ?>'/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="userID" class="col-md-4 col-form-label text-md-right">{{ __('Student/Lecturer ID') }}</label>

                                <div class="col-md-6">
                                    <input id="userID" type="text" class="form-control @error('userID') is-invalid @enderror" name="userID" value = '<?php echo$users[0]->userID; ?>'/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Record') }}
                                    </button>
                                </div>
                            </div>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

