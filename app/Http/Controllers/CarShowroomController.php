<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarShowroom;
use App\Models\Street;
use App\Models\City;

class CarShowroomController extends Controller
{
    public function index()
    {
        $carShowrooms = CarShowroom::all();
        return response()->json($carShowrooms);
    }

    public function getShowroomsCities()
    {
        $showrooms = CarShowroom::with('street.city')->get();
        $citiesWithShowrooms = $showrooms->pluck('street.city.city')->unique();

        return response()->json($citiesWithShowrooms);
    }
}
