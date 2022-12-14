<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\models\Client;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    public function register( RegisterRequest $request){
        $clientdata = $request->validated();
        $clientdata ['password'] = Hash::make($request->input('password'));
    //    dd( $clientdata);
        $client = Client::create($clientdata);
        return responseJson("success" , "Reqisterd Successfully" , );

    }


    public function login(LoginRequest $request){
        if (Auth::guard('client')->attempt(['phone'=>$request->phone , 'password'=>$request->password])) {
            $token = Str::random(60);
            $client = Client::where("phone",$request->phone)->first();
            $client->update([
            'api_token' => $token,
            ]);
            return responseJson("successfuly" , "Login Successfully" , ['token'=> $token ]);
        }else{
            return responseJson("error" , "Data Not Valid " , );
        }
    }


    public function forgetPassword(forgetPasswordRequest $request){
        $client = Client::where('phone',$request->phone)->first();
        if($client){
            $code = rand(1111,9999);
            $client->pincode = $code;
            $client->save();
            if($client->pincode == $code){
                mail::to($client->email)->bbc("ahmedmosaleh1998@gmail.com")->send(new ResetPassword($client));
                return responseJson('1','رجاء فحص هاتفك',$code);
            }
        }
/*
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $token = Arr::random($array);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);
          $data = ['token' => $token];
          Mail::send( '',$data, function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return responseJson('sucess','قم بفحص ايميلك');
    }

    // public function resetPassword(request $erquest){
    //     $request->validate([
    //         'phone' => ''
    //     ])

    // }
*/
    }

    public function logout(){
       $client = auth('api')->user();
        $client->api_token = null;
        $client->save();
        return responseJson('success','you are logged out successfully',);
    }
}
