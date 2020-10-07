<?php

namespace App\Http\Controllers;

use App\Category;
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

//        public function filter (Request $categoryId)
//    {
//        $newsItems = NewsItem::where('category_id', '=', $categoryId)->get();
//        return view ('news-items/index', compact($categoryId));
//    }

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
    public function show($id)
    {

        $newsItem = NewsItem::find($id);


        return view('news-items.show', [
            'newsItem' => $newsItem,

        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function newsItemsList() {
//        $newsItems = NewsItem::orderBy('id', 'desc')->paginate(20);
//        $categories = Category::all();
//        return view('news', compact('newsItems', 'categories'));
//    }


}
