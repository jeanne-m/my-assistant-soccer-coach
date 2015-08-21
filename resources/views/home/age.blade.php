@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create a Practice Plan</h1>
@include('home.breadcrumb')
<p class="lead">Select an Age Group</p>
<div class="button-set">
    @foreach ($ageGroups as $ageGroup)
        <a class="btn btn-primary btn-lg" href="{{ route('home.focus', $ageGroup->slug) }}">{{ $ageGroup->name }}</a>
    @endforeach
</div>
@endsection
