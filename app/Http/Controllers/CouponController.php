<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code' , $request->coupon)->first();
        
        if(!$coupon) {
            session()->flash('message','oops, coupon code was not found!');
            return back();
        }

        $total = stringsToInteger(Cart::subtotal());
     
        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $coupon->discount($total)
        ]);

        session()->flash('message', 'Coupon has been applied.');

        return redirect('/cart');
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
    public function destroy()
    {
        session()->forget('coupon');
        session()->flash('Coupon has been removed');
        return redirect('/cart');
    }
}
