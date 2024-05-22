<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Analysis;
use App\Models\Image;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function create($id)
    {
        $image = Image::find($id);
        return view('show', compact('image'));
    }

    public function destroy($id)
    {

        $image=Image::find($id);

        if($image){
            $image->delete();
        }

        return redirect('/dashboard');
    }

    public function analyze(Request $request, $id)
    {
        $image = Image::find($id);

        // Pagaidu analīzes rezultāti, kamēr nav reālās analīzes implementācijas
        $stars_found = rand(5, 20);
        $average_size = rand(3, 10);
        $largest_star = rand(8, 15);
        $smallest_star = rand(1, 5);

        // Saglabājiet analīzes rezultātus datu bāzē
        $analysis = new Analysis();
        $analysis->image_id = $image->id;
        $analysis->roi_size = $request->input('roi_size');
        $analysis->roi_threshold = $request->input('roi_threshold');
        $analysis->stars_found = $stars_found;
        $analysis->average_size = $average_size;
        $analysis->largest_star = $largest_star;
        $analysis->smallest_star = $smallest_star;
        $analysis->save();

        return response()->json([
            'status' => 'success',
            'data' => [
                'stars_found' => $stars_found,
                'average_size' => $average_size,
                'largest_star' => $largest_star,
                'smallest_star' => $smallest_star
            ]
        ]);
    }



}
