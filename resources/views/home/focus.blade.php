@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create a Practice Plan</h1>
@include('home.breadcrumb')
<p class="lead">Select a Focus</p>
<div class="button-set">
    @foreach ($foci as $focus)
        <a class="btn btn-primary btn-lg" href="{{ route('home.principle', [$ageGroup, $focus->slug]) }}">{{ $focus->name }}</a>
    @endforeach
</div>
@endsection
