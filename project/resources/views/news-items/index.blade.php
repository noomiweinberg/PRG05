@extends ('layouts.master')

@section('sidebar')
    <header class="jumbotron">
        <h1 class="name">Think before you ink</h1>
        <form action="http://127.0.0.1:8000/register">
            <input class="register" type="submit" value="Register" />
        </form>
        <form action="http://127.0.0.1:8000/login">
            <input class="login" type="submit" value="Login" />
        </form>
        <a class="logout" href="{{ route('news') }}"
           onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

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
            @foreach($categories as $category)
                <h3 class="card-title">{{ $category->title}}</h3>
                @foreach($category->newsItems as $newsItem)
                    <div class="col sm card border-0">

                        <img class="card-img" src="{{$newsItem->image}}" alt="{{$newsItem->title}}" >
                        <p class="card-text">{{$newsItem->title}}</p>


                        @if(auth()->user() && !auth()->user()->hasLiked($newsItem))
                            <form action="/like" method="post">
                                @csrf
                                <input type="hidden" name="likeable" value="{{ get_class($newsItem) }}">
                                <input type="hidden" name="id" value="{{ $newsItem->id }}">
                                <button type="submit" class="like">
                                    Like
                                </button>
                            </form>
                        @else
                            <p class="afterlike"  disabled>
                                {{ $newsItem->likes()->count() }} likes
                            </p>
                        @endif

                        
                        <div id="link2-container">
                            <a href="{{route('news.show', $newsItem->id)}}">Tattoo details</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


@endsection
