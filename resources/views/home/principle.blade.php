@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create a Practice Plan</h1>
@include('home.breadcrumb')
<p class="lead">Select {{ $focus->name }} Principle</p>
<div class="button-set">
    @foreach ($principles as $principle)
        <a class="btn btn-primary btn-lg" href="{{ route('home.plan', [$ageGroup, $focus->slug, $principle->slug]) }}">{{ $principle->name }}</a>
    @endforeach
</div>
@endsection
