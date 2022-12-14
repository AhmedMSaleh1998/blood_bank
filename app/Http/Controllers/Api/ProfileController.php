<?php

namespace App\Http\Controllers\Api;
use App\models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function myProfile(){
        return responseJson("success" , "Profile Viewed Successfully" , auth('api')->user());
    }

    public function editProfile(EditProfileRequest $request){
        $clientdata = $request->validated();
        if($request->password){
        $clientdata ['password'] = Hash::make($request->input('password'));
    }
        // $client = Client::find();
        $client = auth('api')->user();
        // $client->name = $request->name;
        // $client->save();
        $client->update($clientdata);
        return responseJson("success" , "Edited Successfully" , $client);
    }

    public function deleteProfile(Client $client)
    {
        $client->delete();

        return responseJson('sucess','Post Deleted successfully');
}
