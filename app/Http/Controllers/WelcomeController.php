<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    Public function show()
    {
        $items = Item::all();
        return view('welcome', compact('items'));
    }
}
