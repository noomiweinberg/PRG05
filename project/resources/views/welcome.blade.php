@extends('layouts.master')

@section('content')
    <div class="container">


        <div class="card-text">

            {{ __('You are logged out!') }}
        </div>
    </div>

    <div class="backbutton">
        <a class="btn btn-link" href="{{ route('news') }}" style="font-size: 30px;">
            {{ __('Back to homepage') }}
        </a>
    </div>

@endsection
