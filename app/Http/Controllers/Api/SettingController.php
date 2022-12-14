<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(){
        $settings = Setting::first();
        return responseJson("success" , "settings shown successfully" , $settings);
    }
}
