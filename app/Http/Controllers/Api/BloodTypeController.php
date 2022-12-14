<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    public function index(){
        $bloodtype = BloodType::all();
        return responseJson("success" , "bloodtypes Shown successfully" , $bloodtype);
    }
}
