<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Item $item)
    {
        $attributes = $this->validate($request, [
            'title' => 'required | min:4 | max:50',
            'price' => 'required',
            'sku' => 'min:2 | unique:items',
            'description' => 'required | min:10 | max: 1050',
            'image' => 'image',
            'category_id' => 'required'
        ]);

        if (! $request->has('image'))
        {
            $attributes['image'] = 'item-placeholder.png';
        }
        else
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $attributes['image'] = $imageName;
        }


        $item->create($attributes);

        session()->flash('message', 'Item successfully created.');
        session()->flash('type', 'success');

        return redirect('/items');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $mightAlsoLike = Item::where('title','!=', $item->title)->inRandomOrder()->take(4)->get();
        return view('items.show', compact(['item','mightAlsoLike']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return void
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        if(\File::exists(public_path('images/'.$item->image))){

            \File::delete(public_path('images/'.$item->image));

        }else{

            dd('File does not exists.');

        }

        $item->delete();

        session()->flash('message', 'Item successfully updated.');
        session()->flash('type', 'danger');

        return redirect('items');
    }
}
