<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\bloodTypeRequest;
use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodTypes = BloodType::all();
        return view('admin.bloodtype.index',compact('bloodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bloodtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bloodTypeRequest $request)
    {
        $bloodType = $request->validated();
        BloodType::create($bloodType);
        return redirect(route('bloodTypes.index'));
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
        $bloodType = BloodType::find($id);
        return view('admin.bloodType.edit',compact('bloodType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bloodTypeRequest $request, $id)
    {
        $bloodType = BloodType::find($id);
        $bloodTypeEdited = $request->validated();
        $bloodType->update($bloodTypeEdited);
        return redirect(route('bloodTypes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bloodType = BloodType::find($id);
        $bloodType->delete();
        return redirect(route('bloodTypes.index'));
    }
}
