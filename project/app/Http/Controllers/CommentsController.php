<?php
//
//namespace App\Http\Controllers;
//
//use App\Comment;
//use App\NewsItem;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;
//use App\Http\Requests\CommentRequest;
//
//class CommentsController extends Controller
//{
//    public function __construct() {
//        $this->middleware('auth');
//    }
//
//
//    public function store(CommentRequest $request)
//    {
//        $newsItem = NewsItem::findOrFail($request->newsItem_id);
//
//        Comment::create([
//            'body' => $request->body,
//            'user_id' => Auth::id(),
//            'newsItem_id' => $newsItem->id
//        ]);
//        return redirect()->route('news.show', $newsItem->id)->with('success', 'Added a comment!');
//    }
//}


namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $newsItem = NewsItem::find($request->newsItem_id);

        $newsItem->comments()->save($comment);

        return back();

    }


}

