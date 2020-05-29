<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    Public function show()
    {
        $items = Item::all();
        //$categories = Category::all();
        return view('welcome', compact(['items']));
    }
}
