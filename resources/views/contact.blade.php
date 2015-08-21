@extends('layout.app')

@section('title', 'Contact')

@section('content')
<h1>Contact</h1>
<form class="form-horizontal" role="form" method="POST" action="TBD">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="email">Your email address</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject">
    </div>
    <button type="submit" class="btn btn-default">Send Message</button>
</form>
@endsection
