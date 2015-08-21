@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create a Practice Plan</h1>
@include('home.breadcrumb')
<p class="lead">Here is your randomized practice plan:</p>
<div class="row">
    @foreach ($drills as $drill)
    <div class="col-md-6">
        <div class="well well-lg">
            <h2>{{ $drill->stage }}</h2>
            <h3>{{ $drill->name }}</h3>
            <img class="img-responsive" src="{{ asset($drill->image) }}" alt="{{ $drill->name }}">
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('home.plan', [$ageGroup, $focus, $principle]) }}">Refresh</a>
    </div>
</div>
@endsection
