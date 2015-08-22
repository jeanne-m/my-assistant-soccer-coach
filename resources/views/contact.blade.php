@extends('layout.app')

@section('title', 'Contact')

@section('content')
<h1>Contact</h1>
@if ($errors->first('spam'))
    <p>Oh no! The message you sent has been marked as spam and will not reach us.</p>
@else
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Success!</strong> {{{ Session::get('message') }}}
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="email">Your email address</label>
                        <p class="form-control-static">{{ old('email') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <p class="form-control-static">{{ old('subject') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="subject">Message</label>
                        <p class="form-control-static">{{ old('content') }}</p>
                    </div>
                </div>
            @else
                <form class="form-horizontal" role="form" method="POST" action="{{ route('contact') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                        <label for="email">Your email address</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                        @if ($errors->first('email'))
                            <p class="help-block">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->first('subject') ? 'has-error' : '' }}">
                        <label for="subject">Subject</label>
                        <input name="subject" type="text" class="form-control" id="subject" value="{{ old('subject') }}">
                        @if ($errors->first('subject'))
                            <p class="help-block">{{ $errors->first('subject') }}</p>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                        <label for="subject">Message</label>
                        <textarea name="content" class="form-control" id="content">{{ old('content') }}</textarea>
                        @if ($errors->first('content'))
                            <p class="help-block">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <input type="text" name="spam" value="{{ old('spam') }}" style="display:none;">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            @endif
        </div>
    </div>
@endif
@endsection
