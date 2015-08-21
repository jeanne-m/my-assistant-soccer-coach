@extends('layout.app')

@section('title', 'Edit Stage')

@section('content')
<h1>Edit Stage: {{ $stage->name }}</h1>
<p class="lead">Make your changes below and click on the Update button.</p>
<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.stage.update', $stage->id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $stage->name }}">
            @if ($errors->first('name'))
                <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('slug') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Slug</label>
        <div class="col-md-6">
            <input type="text" class="form-control generate-slug" name="slug" value="{{ old('slug') ? old('slug') : $stage->slug }}" data-slug-source="input[name=name]">
            @if ($errors->first('slug'))
                <p class="help-block">{{ $errors->first('slug') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default" href="{{ route('admin.stage.index') }}">Cancel</a>
        </div>
    </div>
</form>
@endsection
