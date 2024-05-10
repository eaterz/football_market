<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        foreach ($carts as $cart) {
            $products = Product::where('id', $cart->product_id)->get();
        }
        return view('cart',compact('products','carts'));
    }
    public function edit()
    {


    }
}
