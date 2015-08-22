@extends('layout.app')

@section('title', 'Edit Drill')

@section('content')
<h1>Edit Drill: {{ $drill->name }}</h1>
<p class="lead">Make your changes below and click on the Update button.</p>
<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.drill.update', $drill->id) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $drill->name }}">
            @if ($errors->first('name'))
                <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('slug') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Slug</label>
        <div class="col-md-6">
            <input type="text" class="form-control generate-slug" name="slug" value="{{ old('slug') ? old('slug') : $drill->slug }}" data-slug-source="input[name=name]">
            @if ($errors->first('slug'))
                <p class="help-block">{{ $errors->first('slug') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('stage_id') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Stage</label>
        <div class="col-md-6">
            <select class="form-control" name="stage_id">
                @foreach ($stages as $stage)
                    <option value="{{ $stage->id }}"{{ old('stage_id') && old('stage_id') === $stage->id || $drill->stage_id === $stage->id ? ' selected=selected' : '' }}>{{ $stage->name }}</option>
                @endforeach
            </select>
            @if ($errors->first('stage_id'))
                <p class="help-block">{{ $errors->first('stage_id') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->first('age_id') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Age Groups</label>
        <div class="col-md-6">
            <div class="row">
                @foreach ($ageGroups as $ageGroup)
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <input name="age_id[]" type="checkbox" value="{{ $ageGroup->id }}"{{ in_array($ageGroup->id, $drill->age_id) ? ' checked=checked' : '' }}>
                                {{ $ageGroup->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->first('principle_id') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Principles</label>
        <div class="col-md-6">
            <div class="row">
                @foreach ($principles as $principle)
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <input name="principle_id[]" type="checkbox" value="{{ $principle->id }}"{{ in_array($principle->id, $drill->principle_id) ? ' checked=checked' : '' }}>
                                {{ $principle->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">Image</label>
        <div class="col-md-6">
            <input type="file" name="image">
            <img class="img-responsive" src="{{ asset($drill->image) }}" alt="Drill image">
            @if ($errors->first('image'))
                <p class="help-block">{{ $errors->first('image') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default" href="{{ route('admin.drill.index') }}">Cancel</a>
        </div>
    </div>
</form>
@endsection
