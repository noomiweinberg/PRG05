@extends ('layouts.app')

@section ('content')
    <header class="jumbotron">
        @if($newsItem)
            <h2 class="head">{{$newsItem['description']}}</h2>
            @else
        <h1 class="modal-title float-left">{{$error}}</h1>
            @endif
        <div id="link-container">
        <a href="{{route ('news')}}">Back to tattoo feed</a>
        </div>
    </header>



    <div class="container">
        @if ($newsItem)
            <article>
                <img class= "detail" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}"/>
                <p class="card-text">{{$newsItem['details']}}</p>
            </article>
            @endif
    </div>
    @endsection
