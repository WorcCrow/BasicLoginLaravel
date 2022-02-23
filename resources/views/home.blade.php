@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                
            </div>
            
        </div>

        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">Personal Info</div>
                <form action={{ route('saveinfo') }} method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ $auth->firstname }}" name="firstname">
                            @error('firstname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ $auth->lastname }}" name="lastname">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" value="{{ $auth->age }}" name="age">
                            @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="3" name="address">{{ $auth->address }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <input class="btn btn-primary" type="submit" value="Save Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">Security</div>

                <div class="card-body">
                    <form action="{{ route('changepassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Old Password" name="oldpassword">
                            @error('oldpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" id="password" class="form-control @error('newpassword') is-invalid @enderror" placeholder="New Password" name="newpassword">
                            <small class="password-format d-none">
                                <small class='text-danger length d-block'>- Must contain atleast 8 - 12 characters of length</small>
                                <small class='text-danger upper d-block'>- Must contain atleast one uppercase letter</small>
                                <small class='text-danger lower d-block'>- Must contain atleast one lowercase letter</small>
                                <small class='text-danger number d-block'>- Must contain atleast one number</small>
                                <small class='text-danger special d-block'>- Must contain atleast one special character</small>
                            </small>
                            @error('newpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                             @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                        </div>
                        @error('success')
                            <div class="alert alert-success" role="alert">
                                Password Successfully Changed
                            </div>
                        @enderror
                        <div class="d-grid gap-2 d-md-block">
                            <input class="btn btn-primary" type="submit" value="Change">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">Advance</div>

                <div class="card-body">
                    <form action="{{ route('accountdelete') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Enter Password to Delete Account</label>
                            <input type="password" class="form-control" placeholder="Current Password" name="password">
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <input class="btn btn-danger" type="submit" value="Delete Account">
                        </div>

                        @error('deletefailed')
                            <div class="alert alert-danger" role="alert">
                                Failed: Invalid Password
                            </div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>


       
    </div>
</div>
@endsection
