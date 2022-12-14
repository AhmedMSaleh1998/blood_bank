<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminEditClientRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use App\Models\BloodType;
use App\Models\City;
use App\Models\client;
use App\Models\Governorate;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('admin.client.index',compact('clients','governorates','cities','bloodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('admin.client.create',compact('governorates','cities','bloodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        //$client['password'] = Hash::make($request->password);
        $client = $request->validated();
        $client['password'] = Hash::make($request->input('password'));
         Client::create($client);
        return redirect(route('client.index'));
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
        $client = Client::find($id);
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('admin.client.edit',compact('governorates','cities','bloodTypes','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(adminEditClientRequest $request, $id)
    {
        $client = Client::find($id);
        $clientEdited = $request->validated();
        $client->update($clientEdited);
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect(route('clients.index'));
    }
}
