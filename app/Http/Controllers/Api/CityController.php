<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $city = City::all();
        return responseJson("success" , "cities Shown successfully" , $city);
    }

    public function show($id)
    {
        $city = City::find($id);
        return responseJson("success" , "city Shown successfully" , $city);
    }
}
