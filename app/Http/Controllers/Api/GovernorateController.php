<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GovernorateResource;
use App\Models\Governorate;
// use app\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index(){
        $governorate = Governorate::all();
        return responseJson("success" , "governorates Shown successfully" ,  GovernorateResource::collection($governorate));
    }
}
