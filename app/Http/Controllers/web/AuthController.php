<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonnationRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donnationRequests = DonnationRequest::paginate(5);
        $bloodTypes = BloodType::all();
        $cities = City::all();
        return view('web.index',compact('donnationRequests','bloodTypes','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('web.Auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleLogin(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        $credentials = $request->validated();

        if (auth('client')->attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect (route('index'));
        }
        return back()->with(['error' => 'Your data is wrong']);
    }

    public function register()
    {
        return view('web.Auth.register');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(Request $request)
    {
    $user = Auth('client')->user();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route('index'));
    }
}
