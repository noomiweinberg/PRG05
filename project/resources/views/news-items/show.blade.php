@extends ('layouts.master')

@section ('content')
    <header class="jumbotron">
        @if($newsItem)
            <h2 class="head">{{$newsItem['title']}}</h2>
            @else
{{--        <h1 class="modal-title float-left">{{$error}}</h1>--}}
            @endif
        <div id="link-container">

        <a href="{{route ('news')}}">Back to tattoo feed</a>
        </div>
    </header>



    <div class="container">
        @if ($newsItem)
            <article>
                <img class= "detail" src="{{$newsItem['image']}}" alt="{{$newsItem['category']}}"/>
                <p class="card-text">{{$newsItem['description']}}</p>
            </article>
            @endif
    </div>


    </br>


                    <div class="card-body">
                        <h5 class="comment">Comments:</h5>

                        @foreach($comments as $comment)
                            <div class="display-comment">
                                <strong>{{ $comment->user->name }}</strong>
                                <p>{{ $comment->comment }}</p>

                            </div>
                        @endforeach

                        <hr />
                    </div>

    @can('message_hasEnoughLikes')
        <h6 class="message">You must have liked at least 5 posts to comment on this post.</h6>
    @endcan

                  @can('comment_newsItems')
                      @can('hasEnoughLikes')


                    <div class="card-body">
                        <h5 class="comment">Leave a comment</h5>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control" />
                                <input type="hidden" name="newsItem_id" value="{{ $newsItem->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" style="font-size: 0.8em;" value="Add Comment" />
                            </div>

                        </form>

                </div>
                    @endcan
                    @endcan
            </div>
        </div>
    </div>


@endsection


