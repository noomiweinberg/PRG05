@extends('layouts.master')

@section('content')
<div class="container">


                <div class="card-text">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Hello {{  Auth::user()->name }}
                    </p>
                    {{ __('You are logged in!') }}
                </div>
            </div>

        <div class="backbutton">
        <a class="btn btn-link" href="{{ route('news') }}" style="font-size: 30px;">
            {{ __('Back to homepage') }}
        </a>
    </div>

@endsection
