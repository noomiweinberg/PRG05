<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsItem;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function show()
    {
        // Controller
        //        data ophalen uit de database
        $categoriesMenu = Category::all();
        $categories = Category::all();

        //    data  meegeven aan de view
        return view('news-items/index', compact('categories', 'categoriesMenu'));
    }

    public function filter(Request $request)
    {
        if ($request->input('category_id') == 'all') {
            return redirect('news');
        }
        $categoriesMenu = Category::all();
        $categories = Category::where('id', $request->input('category_id'))->get();

        return view('news-items/index', compact('categories', 'categoriesMenu'));
    }

//    public function search(Request $request)
//    {
//        $search = $request->get('search');
//        $newsItems = NewsItem::where('title', 'like', '%'.$search.'%')->paginate(5);
//        return view('news-items/index', ['newsItems' => $newsItems]);
//    }

}
