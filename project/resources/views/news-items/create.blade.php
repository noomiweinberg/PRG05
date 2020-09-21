@extends ('layouts.app')

@section ('content')

    <header class="jumbotron">
        <h2 class="head">Voeg een nieuwe tattoo toe</h2>
        <div id="link-container">
        <a href="{{route('news')}}">Terug naar tattoofeed</a>
        </div>
    </header>

    <div class="container">
        <form method="post" action="{{route('news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title"/>
                @if ($errors->has ('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <input style="height: 100px;" type="text" class="form-control" id="description" name="description"/>
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <input style="height: 100px;" type="text" class="form-control" id="details" name="details"/>
                @if ($errors->has('details'))
                    <span class="alert-danger form-check-inline">{{$errors->first('details')}}</span>
                @endif
                </br>
            <button type="submit" class="btn-primary btn-block">Tattoo opslaan</button>

            </div>
        </form>
    </div>
    @endsection
