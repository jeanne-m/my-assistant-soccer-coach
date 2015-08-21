@extends('layout.app')

@section('title', 'My Profile')

@section('content')
<h1>My Profile</h1>
<p class="lead">Edit your profile information by clicking the "Edit Profile" button below.</p>
<form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            @if ($errors->first('name'))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <p class="help-block">{{ $errors->first('name') }}</p>
            @else
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}">
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            @if ($errors->first('email'))
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                <p class="help-block">{{ $errors->first('email') }}</p>
            @else
                <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}">
            @endif
        </div>
    </div>
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
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a class="btn btn-default" href="{{ route('profile.show') }}">Cancel</a>
        </div>
    </div>
</form>
@endsection
