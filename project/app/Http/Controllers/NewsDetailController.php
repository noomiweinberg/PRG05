<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsDetailController extends Controller
{
    public function show ()
    {
        return view ('newsdetail');
    }
}
