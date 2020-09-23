<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsItem;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function show ()
    {
        // Controller
        //        data ophalen uit de database
        $categories = Category::all();

        //    data  meegeven aan de view
        return view ('news-items/home', compact ('categories'));
    }
}
