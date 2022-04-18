<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $userId = auth()->user()->id;
        $cartItems = \Cart::session($userId)->getContent();

        // dd($cartItems);
        return view('frontend.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {   $userId = auth()->user()->id;
        \Cart::session($userId)->add([
            'id' => $request->id,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            
            'attributes' => array(
                'image' => $request->photo_url,
                'detail'=>$request->description,
               
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');


    }
}
