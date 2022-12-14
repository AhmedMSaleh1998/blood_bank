<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\notificationSettingRequest;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    public function notificationSetting(notificationSettingRequest $request){

            auth('api')->user()->governorates()->toggle($request->governorate_ids);
            auth('api')->user()->BloodTypes()->toggle($request->blood_type_ids);
            return responseJson('sucess','Your Process Done Successfully',auth('api')->user()->governorates,auth('api')->user()->BloodTypes);
    }
}
