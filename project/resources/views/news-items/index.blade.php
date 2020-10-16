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

            @can('create_newsItems')
            <a href="{{route('news.create')}}">Add a new tattoo</a>
                @endcan
        </div>

        <h5 class="search-title">Search Bar</h5>
        <div class="col-md-5" style="margin-left: 300px;">
        <form method="get" action="{{route('news.search')}}">
            <div class="input-group">
            <input type="search" name="search" class="form-control" >
                <span class="input-group-btn" >
            <button type="submit" class="btn btn-primary" style="font-size: 20px;">Search</button>
                </span>
            </div>
        </form>
        </div>

        </br>
        </br>

        <h4 class="category-title">Category Select</h4>
        <div class="filter text-center" style="margin-top: 20px;">

            <form method="post" action="{{route('news.filter')}}">
            {{ csrf_field() }}
            <select name="category_id">
                <option value="all">All</option>
                @foreach($categoriesMenu as $category)
                    <option value="{{ $category->id }}" >{{ $category->title }}</option>
{{--                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected="selected" @endif>{{ $category->title }}</option>--}}
                @endforeach
            </select>
                <button type="submit" class="btn btn-primary" style="font-size: 20px;">Choose Category</button>
            </form>

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
                                @can('like_newsItems')
                                <button type="submit" class="like">
                                    Like
                                </button>
                                @endcan
                            </form>
                        @else

                            <p class="afterlike"  disabled>
                                {{ $newsItem->likes()->count() }} likes
                            </p>

                        @endif


                        <div id="link2-container">
                            <a href="{{route('news.show', $newsItem->id)}}">Tattoo details</a>
                        </div>

                        @can('delete_newsItems')
                        <div id="link3-container">
                            <a href="{{route('news.delete', ['newsItem_id'=>$newsItem->id])}}" style="color:red;">Delete</a>
                        </div>
                            @endcan

                        @can('edit_newsItems')
                        <div id="link4-container">
                            <a href="{{route('news.edit', $newsItem->id)}}"  style="color:red;">Edit</a>
                        </div>
                            @endcan


                        <div class="togglebutton">
                        @if ($newsItem->color_status == 1)
                            <p class="colorstatus">Color</p>
                        @else
                            <p>Black & Grey</p>
                        @endif
                            @can('toggle_newsItems')
                        <form method="post" action="{{route('news.toggle',$newsItem->id)}}" id='toggleform'>
                            @csrf
                            <div class="form-group row" style="margin-left: 20px;">
                                <label class="switch ml-3">
                                    <input name="color_status" id="color_status" value="1" type="checkbox" onclick="submit()" @if($newsItem->color_status == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </form>
                                @endcan
                        </div>

                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


@endsection
