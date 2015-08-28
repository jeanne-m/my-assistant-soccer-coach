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
            <h2>{{ $drill->stage['name'] }}</h2>
            <h3>{{ $drill->name }}</h3>
            <div class="drill-image">
                <img class="img-responsive" src="{{ asset($drill->image) }}" alt="{{ $drill->name }}">
            </div>
            @if ($drill->notes || $drill->coaching_points)
                <div class="row">
                    @if ($drill->notes)
                        <div class="col-xs-6">
                            <h5>Equipment / Grid Size</h5>
                            <div class="drill-notes">
                                {!! $drill->notes !!}
                            </div>
                        </div>
                    @endif
                    @if ($drill->coaching_points)
                        <div class="col-xs-6">
                            <h5>Coaching Points</h5>
                            <div class="drill-notes">
                                {!! $drill->coaching_points !!}
                            </div>
                        </div>
                    @endif
                </div>
            @endif
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
