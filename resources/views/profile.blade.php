@extends('layout.app')

@section('title', 'My Profile')

@section('content')
<h1>My Profile</h1>
<p class="lead">Edit your profile information by clicking the "Edit Profile" button below.</p>
@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{{ Session::get('message') }}}
    </div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            @if (isset($edit) && $edit)
                @if ($errors->first('name'))
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <p class="help-block">{{ $errors->first('name') }}</p>
                @else
                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}">
                @endif
            @else
                <p class="form-control-static">{{ $user->name }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            @if (isset($edit) && $edit)
                @if ($errors->first('email'))
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @else
                    <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}">
                @endif
            @else
                <p class="form-control-static">{{ $user->email }}</p>
            @endif
        </div>
    </div>
    @if (isset($edit) && $edit)
        <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                @if ($errors->first('password'))
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @else
                    <input type="password" class="form-control" name="password" value="{{ old('password') ? old('password') : 'donotchangeme' }}">
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                @if ($errors->first('password'))
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @else
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') ? old('password_confirmation') : 'donotchangeme' }}">
                @endif
            </div>
        </div>
    @else
        <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                <p class="form-control-static">●●●●●●●●●●●●●●●●●●●●</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Role</label>
            <div class="col-md-6">
                <p class="form-control-static">{{ $user->admin ? 'Admin' : 'User'}}</p>
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            @if (isset($edit) && $edit)
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a class="btn btn-default" href="{{ route('profile.show') }}">Cancel</a>
            @else
                <a class="btn btn-primary" href="{{ route('profile.edit') }}">Edit Profile</a>
                <a id="delete-profile" class="btn btn-default" href="{{ route('profile.delete') }}">Delete Profile</a>
            @endif
        </div>
    </div>
</form>
<script id="modal-delete-profile" type="text/template">
<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Confirm Deletion</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('profile.delete') }}">Yes, Continue</a>
            </div>
        </div>
    </div>
</div>
</script>
@endsection
