<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsItem;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function show ()
    {
        // Controller
        //        data ophalen uit de database
        $categoriesMenu = Category::all();
        $categories = Category::all();
//        $newsItems = NewsItem::
//            ->leftJoin('categories', 'news_items.category_id', '=', 'categories.id')
//            ->select('news_items.id','categories.title', 'news_items.title as news_title',
//                'news_items.description', 'news_items.image')->first();
//        dd($newsItems);

        //    data  meegeven aan de view
        return view ('news-items/index', compact ('categories', 'categoriesMenu'));
    }

    public function filter (Request $request)
    {
        if ( $request->input('category_id') == 'all') {
            return redirect('news');
        }
        $categoriesMenu = Category::all();
        $categories = Category::where('id', $request->input('category_id'))->get();
        // Request $request
        //var_dump($request);
        //$category_id = $request->input('category_id');
        //$newsItems = NewsItem::where('category_id', '=', $category_id)->get();

//        $newsItems = NewsItem::where('category_id', 1)
//            ->leftJoin('categories', 'news_items.category_id', '=', 'categories.id')
//            ->select('news_items.id','categories.title', 'news_items.title as news_title',
//                'news_items.description', 'news_items.image')->first();
//        dd($newsItems);
        return view ('news-items/index', compact('categories', 'categoriesMenu'));
    }













//    public function index(){
//        $categories = NewsItem::where(('categories')->orderBy('category_title')->get());
//        $newsItems = DB::orderBy('title')->get();
//        return view('news.index',compact('newsItems','categories'));
//    }
//
//
//    public function filter(Request $request){
//        $categories = $request->categories;
//
//        // $filter = [$location->location, $gender->gender];
//        //dd($location);
//
//        $categories = NewsItem::where(('categories')->orderBy('category_title')->get());
//
////        if(empty($gender) && empty($location)){
////            $sponsorKid = Kid::orderBy('id')->get();
////        }elseif(!empty($gender) && !empty($location)){
////            $sponsorKid = DB::table('kids')->where('current_country', $location)->where('gender', $gender)->orderby('id')->get();
////        }elseif($gender != true){
////            $sponsorKid = DB::table('kids')->where('current_country', $location)->orderby('id')->get();
////        }elseif($location != true){
////            $sponsorKid = DB::table('kids')->where('gender', $gender)->orderby('id')->get();
////        }else{
////            $sponsorKid = Kid::orderBy('id')->get();
////        }
//        return view('news.index',compact('newsItems','categories'));
//    }

}
