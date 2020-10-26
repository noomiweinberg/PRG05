<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $newsItems = NewsItem::all();
//        return view ('news-items.index',compact('newsItems'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('news-items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'


        ]);

        $newsItem = new Newsitem();
        $newsItem->category_id = $request->get('category');
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
        $newsItem->image = $request->get('image');


        $newsItem->save();
        return redirect('news')->with('success', 'Tattoo saved!');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function show(Request $request, $id)
    {

        $newsItem = NewsItem::find($id);

        $comments = Comment::where('news_item_id', $id)->get();


        return view('news-items/show', compact('newsItem', 'comments'));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categoriesMenu = Category::all();

        // get the newsItem
        $data = NewsItem::find($id);

        // show the edit form
        return view('news-items.edit', compact('data', 'categoriesMenu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = NewsItem::find($id);
        $data->update($request->all());
        return redirect()->route('news', compact('data'))->with('success', 'Tattoo updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $news_items_id
     * @return void
     * @throws \Exception
     */

    public function delete($news_items_id)
    {
        $newsItem = NewsItem::where('id', $news_items_id)->first();
        $newsItem->delete();
        return redirect()->route('news')->with('success', 'Tattoo deleted!');

    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categoriesMenu = Category::all();
        $categories = Category::where('title', 'like', '%' . $search . '%')->get();
        return view('news-items/index', ['categories' => $categories, 'categoriesMenu' => $categoriesMenu]);
    }

    public function toggle(Request $request, $id)
    {
        $color_status = $request->input('color_status');
        $newsItem = NewsItem::find($id);
        if (isset($color_status)) {
            // color
            $newsItem->color_status = 1;
            $newsItem->save();
            return redirect('news')->with('success', 'Changed to color');
        } else {
            // black & grey
            $newsItem->color_status = 0;
            $newsItem->save();
            return redirect('news')->with('success', 'Changed to black & grey');
        }


    }

}
