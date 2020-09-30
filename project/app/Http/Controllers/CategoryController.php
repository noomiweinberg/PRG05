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
        $categories = Category::all();

        //    data  meegeven aan de view
        return view ('news-items/index', compact ('categories'));
    }
}
