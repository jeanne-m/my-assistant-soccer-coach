@extends('layout.app')

@section('title', 'Create a Principle')

@section('content')
<h1>Create a Principle</h1>
<p class="lead">Enter the details for your addition and click on the Add button.</p>
<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.principle.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if ($errors->first('name'))
                <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('slug') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Slug</label>
        <div class="col-md-6">
            <input type="text" class="form-control generate-slug" name="slug" value="{{ old('slug') }}" data-slug-source="input[name=name]">
            @if ($errors->first('slug'))
                <p class="help-block">{{ $errors->first('slug') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('focus_id') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Focus</label>
        <div class="col-md-6">
            <select class="form-control" name="focus_id">
                <option>Select...</option>
                @foreach ($foci as $focus)
                    <option value="{{ $focus->id }}">{{ $focus->name }}</option>
                @endforeach
            </select>
            @if ($errors->first('focus'))
                <p class="help-block">{{ $errors->first('focus') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-default" href="{{ route('admin.principle.index') }}">Cancel</a>
        </div>
    </div>
</form>
@endsection
