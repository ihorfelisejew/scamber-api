<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    public function show($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'showroom_id' => 'required',
            'content' => 'required',
            'rating_id' => 'required',
        ]);

        $review = Review::create($request->all());

        return response()->json($review, 201);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $this->validate($request, [
            'client_id' => 'required',
            'showroom_id' => 'required',
            'content' => 'required',
            'rating_id' => 'required',
        ]);

        $review->update($request->all());

        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted']);
    }
}
