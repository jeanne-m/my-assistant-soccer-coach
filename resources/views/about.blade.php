@extends('layout.app')

@section('title', 'About')

@section('content')
<h1>About</h1>
<p class="lead">My Assistant Soccer Coach automatically generates a practice plan that aligns with the age group and principle of play of your choice, all in just three clicks.</p>
<p>The drills and games presented to you are pulled from a catalog. Each drill in the catalog is labeled with several attributes.</p>
<p>The first attribute is what age groups the drill is appropriate for. Not all drills and games are appropriate for all ages (e.g., a half field 6v6 scrimmage with full size goals might suit a U17 team but not a U9 team).</p>
<p>The second attribute is what stage in training the drill should be used. This is to dictate which ones are associated as a warmup, small sided game, modified small sided game, or a game.</p>
<p>Finally, each drill is rated on every individual principle of play (both attacking and defending principles). For example, if you'd like your practice plan to include drills that are more focused on your defense's compactness, simply select the 'Defense' focus and 'Compactness' principle and you will be provided with drills that have been given a 'High' rating for 'Compactness.'</p>
<p>Once you've made your selections, a random drill for each stage that matches your criteria will be provided as your final practice plan!</p>
@endsection
