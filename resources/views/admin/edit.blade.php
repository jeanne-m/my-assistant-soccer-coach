@extends('layout.app')

@section('title', 'Admin')

@section('content')
<h1>{{ $heading }}</h1>
<p class="lead">Make your changes below and click on the Update button.</p>
<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.' . $resourcePath . '.update', $data->id) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($columns as $column)
        @if ($column['title'] !== 'id')
            <div class="form-group {{ $errors->first($column['title']) ? 'has-error' : '' }}">
                <label class="col-md-4 control-label">{{ $column['heading'] }}</label>
                <div class="col-md-6">
                    @if ($column['heading'] === 'Focus')
                        <select class="form-control" name="focus_id">
                            @foreach ($foci as $focus)
                                <option value="{{ $focus->id }}"{{ old('focus_id') && old('focus_id') === $focus->id || $data->focus_id === $focus->id ? ' selected=selected' : '' }}>{{ $focus->name }}</option>
                            @endforeach
                        </select>
                    @elseif ($column['heading'] === 'Stage')
                        <select class="form-control" name="stage_id">
                            @foreach ($stages as $stage)
                                <option value="{{ $stage->id }}"{{ old('stage_id') && old('stage_id') === $stage->id || $data->stage_id === $stage->id ? ' selected=selected' : '' }}>{{ $stage->name }}</option>
                            @endforeach
                        </select>
                    @elseif ($column['heading'] === 'Ages')
                        <div class="row">
                            @foreach ($ageGroups as $ageGroup)
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input name="age_id[]" type="checkbox" value="{{ $ageGroup->id }}"{{ in_array($ageGroup->id, json_decode($data->age_id)) ? ' checked=checked' : '' }}>
                                            {{ $ageGroup->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif ($column['heading'] === 'Principles')
                        <div class="row">
                            @foreach ($principles as $principle)
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input name="principle_id[]" type="checkbox" value="{{ $principle->id }}"{{ in_array($principle->id, json_decode($data->principle_id)) ? ' checked=checked' : '' }}>
                                            {{ $principle->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif ($column['title'] === 'image')
                        <input type="file" name="image">
                        <img class="img-responsive" src="{{ asset($data->image) }}" alt="Drill image">
                    @elseif ($column['title'] === 'slug')
                        <input type="text" class="form-control generate-slug" name="slug" value="{{ old($column['title']) ? old($column['title']) : $data->$column['title'] }}" data-slug-source="input[name=name]">
                    @else
                        <input type="text" class="form-control" name="{{ $column['title'] }}" value="{{ old($column['title']) ? old($column['title']) : $data->$column['title'] }}">
                    @endif
                    @if ($errors->first($column['title']))
                        <p class="help-block">{{ $errors->first($column['title']) }}</p>
                    @endif
                </div>
            </div>
        @endif
    @endforeach
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default" href="{{ route('admin.' . $resourcePath . '.index') }}">Cancel</a>
        </div>
    </div>
</form>
@endsection
