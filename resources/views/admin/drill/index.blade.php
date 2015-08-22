@extends('layout.app')

@section('title', 'Manage Drills')

@section('content')
<h1>Manage Drills</h1>
<p class="lead">
    <a class="btn btn-primary" href="{{ route('admin.drill.create') }}">Create a Drill</a>
</p>
@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{{ Session::get('message') }}}
    </div>
@endif
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Stage</th>
            <th>Age Groups</th>
            <th>Principles</th>
            <th>Image</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($drills as $drill)
            <tr>
                <td>{{ $drill->id }}</td>
                <td>{{ $drill->name }}</td>
                <td>{{ $drill->slug }}</td>
                <td>{{ $drill->stage['name'] }}</td>
                <td>{{ $drill->age_groups }}</td>
                <td>{{ $drill->principles }}</td>
                <td><img class="img-thumbnail" src="{{ asset($drill->image) }}" alt="Resource image"></td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.drill.edit', $drill->id) }}">Edit</a>
                    <a class="btn btn-danger modal-confirm" href="{{ route('admin.drill.destroy', $drill->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script id="modal-delete" type="text/template">
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
                <p>Are you sure you want to delete this drill?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Yes, Continue</a>
            </div>
        </div>
    </div>
</div>
</script>
@endsection
