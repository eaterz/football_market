<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Analysis;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $images = Image::where('user_id', auth()->user()->id)->get();
        return view('dashboard',compact('images'));
    }

    public function create()
    {
        return view('upload');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = new Image();
            $image->title = $request->input('title');
            $image->image_path = $imagePath;
            $image->user_id = auth()->user()->id;
            $image->save();
        }

        return redirect('/dashboard')->with('success', 'Image uploaded successfully');
    }





}
