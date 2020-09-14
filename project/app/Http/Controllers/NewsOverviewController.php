<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsOverviewController extends Controller
{
    public function show ()
    {
        return view ('newsoverview');
    }


}
