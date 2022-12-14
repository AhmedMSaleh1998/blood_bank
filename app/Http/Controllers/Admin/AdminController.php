<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminLoginRequest;
use App\Models\Admin;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\client;
use App\Models\Contact;
use App\Models\DonnationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function handlelogin(adminLoginRequest $request){
        {
            $remember_me = $request->has('remember_me') ? true : false;
            $credentials = $request->validated();

            if (auth('admin')->attempt($credentials, $remember_me)) {
                $request->session()->regenerate();
                return redirect (route('admin.index'));

            }
            return back()->with(['error' => 'Your data is wrong']);
        }
    }
    public function index(){
        $clients              = client::count();
        $governorates         = Governorate::count();
        $cities               = City::count();
        $categories           = Category::count();
        $posts                = Post::count();
        $contacts             = Contact::count();
        $donnation_requests   = DonnationRequest::count();
        $settings             = Setting::count();
        $bloodTypes           = BloodType::count();
        return view ('admin.index',compact('clients','governorates','cities','categories','posts','contacts','donnation_requests','settings','bloodTypes'));
    }
}
