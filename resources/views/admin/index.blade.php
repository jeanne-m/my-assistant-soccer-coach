@extends('layout.app')

@section('title', 'Admin')

@section('content')
<h1>{{ $heading }}</h1>
<p class="lead">
    @if (!isset($admin) || !$admin)
        <a class="btn btn-primary" href="{{ route('admin.' . $resourcePath . '.create') }}">Create {{ $resourceTitle }}</a>
    @endif
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
            @foreach ($columns as $column)
                <th>{{ $column['heading'] }}</th>
            @endforeach
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($columns as $column)
                    @if ($column['title'] === 'image')
                        <td><img class="img-thumbnail" src="{{ asset($row->$column['title']) }}" alt="Resource image"></td>
                    @else
                        <td>{{ $row->$column['title'] }}</td>
                    @endif
                @endforeach
                <td>
                    @if (isset($admin) && $admin)
                        @if ($row->isAdmin)
                            <a class="btn btn-info" href="{{ route('admin.' . $resourcePath . '.revoke', $row->id) }}">Revoke Admin Privileges</a>
                        @else
                            <a class="btn btn-info" href="{{ route('admin.' . $resourcePath . '.grant', $row->id) }}">Grant Admin Privileges</a>
                        @endif
                    @else
                        <a class="btn btn-info" href="{{ route('admin.' . $resourcePath . '.edit', $row->id) }}">Edit</a>
                    @endif
                    <a class="btn btn-danger modal-confirm" href="{{ route('admin.' . $resourcePath . '.destroy', $row->id) }}">Delete</a>
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
                <p>Are you sure you want to delete this {{ $resourceTitle }}?</p>
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
