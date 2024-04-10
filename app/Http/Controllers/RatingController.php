<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return response()->json($ratings);
    }

    public function show($id)
    {
        $rating = Rating::find($id);
        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }
        return response()->json($rating);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type_rating' => 'required',
        ]);

        $rating = Rating::create($request->all());

        return response()->json($rating, 201);
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::find($id);
        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        $this->validate($request, [
            'type_rating' => 'required',
        ]);

        $rating->update($request->all());

        return response()->json($rating);
    }

    public function destroy($id)
    {
        $rating = Rating::find($id);
        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        $rating->delete();

        return response()->json(['message' => 'Rating deleted']);
    }
}
