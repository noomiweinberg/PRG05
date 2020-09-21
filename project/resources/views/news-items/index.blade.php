@extends ('layouts.app')

@section('sidebar')
    <header class="jumbotron">
    <h1 class="name">Think before you ink</h1>
    </header>
@endsection

@section ('content')
    <header class="jumbotron">
        <h2 class="head">Tattoo feed</h2>
        <div id="link-container">
        <a href="{{route('news.create')}}">Add a new tattoo</a>
        </div>
    </header>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
        <div class="newsitem">
            @foreach ($newsItems as $newsItem)
                <div class="col sm card border-0">
                    <h3 class="card-title">{{$newsItem['title']}}</h3>
                    <img class="card-img" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}">
                    <p class="card-text">{{$newsItem['description']}}</p>

                    <div id="link2-container">
                    <a href="{{route('news.show', $newsItem['id'])}}">Tattoo details</a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    @endsection
