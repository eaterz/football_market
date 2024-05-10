<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product',compact('products'));
    }
    public function create(){

        return view('admin.create');

    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'SKU' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->SKU = $request->input('SKU');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/admin/product');

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit',compact('product'));
    }
    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'SKU' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        $id=$request->input('id');
        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->SKU = $request->input('SKU');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->save();
        return redirect('/admin/product');
    }

    public function destroy($id)
    {

        $product=Product::find($id);

        if($product){
            $product->delete();
        }

        return redirect('/admin/product');
    }
}

