<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $region = Region::all();
        return view('place.index', compact('region'));
    }
    public function getCountry(Request $request){
        if($request->ajax()){
            $country = Country::where('region_id', $request->region_id)->get();
            return response()->json($country);
        }        
    }
    public function getCity(Request $request){
        if($request->ajax()){
            $city = City::where('region_id',$request->region_id)
            ->where('country_id',$request->country_id)->get();
            return response()->json($city);
        }
    }
}
