<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use NumberFormatter;
use Symfony\Component\CssSelector\Parser\Handler\NumberHandler;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
                $discount = session()->get('coupon')['discount'] ?? 0;
            
                $items = Cart::content();
                $subtotal = stringsToInteger(Cart::subtotal());
                $pSubtotal = asDollars($subtotal);
                $total = asDollars($subtotal - $discount);
                return view('cart', compact(['items', 'pSubtotal', 'total']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request)
    {
        Cart::update($request->rowId, $request->quantity);
        session()->flash('message','Cart has been updated');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::add($request->id, $request->title, $request->quantity, $request->price)
            ->associate('App\Item');

        session()->flash('message','Your item has been added to cart <a href="/cart" class="text-orange-500 hover:text-orange-400 underline">View Cart</a> ');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        session()->flash('message', 'Item has been removed');
        return back();
    }
}
