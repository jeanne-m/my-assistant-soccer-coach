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
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <p class="form-control-static">{{ $user->name }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <p class="form-control-static">{{ $user->email }}</p>
        </div>
    </div>
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
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a class="btn btn-primary" href="{{ route('profile.edit') }}">Edit Profile</a>
            <a id="delete-profile" class="btn btn-default" href="{{ route('profile.destroy') }}">Delete Profile</a>
        </div>
    </div>
</div>
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
                <a class="btn btn-primary" href="{{ route('profile.destroy') }}">Yes, Continue</a>
            </div>
        </div>
    </div>
</div>
</script>
@endsection
