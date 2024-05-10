<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sizes = Size::all();
       return view('product',compact('products',));
    }
    public function show($id){
        $product = Product::find($id);
        $sizes = Size::all();
        if ($product){
            return view('show',compact('product','sizes'));
        }
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'product_id' => 'required',
            'product_price' => 'required',
        ]);

        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->user_id = auth()->user()->id;
        $cart->size_id = $request->input('size');
        $cart->quantity = 1;
        $cart->total = $request->input('product_price');
        $cart->save();

        return redirect('/cart');
    }

}
