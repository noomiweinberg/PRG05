@extends ('layouts.app')

@section ('content')

    <header class="jumbotron">
        <h2 class="head">Add a new tattoo</h2>
        <div id="link-container">
        <a href="{{route('news')}}">Back to tattoofeed</a>
        </div>
    </header>

    <div class="container">
        <form method="post" action="{{route('news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"/>
                @if ($errors->has ('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input style="height: 100px;" type="text" class="form-control" id="description" name="description"/>
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <input style="height: 100px;" type="text" class="form-control" id="details" name="details"/>
                @if ($errors->has('details'))
                    <span class="alert-danger form-check-inline">{{$errors->first('details')}}</span>
                @endif
                </br>
            <button type="submit" class="btn-primary btn-block">Save tattoo</button>

            </div>
        </form>
    </div>
    @endsection
