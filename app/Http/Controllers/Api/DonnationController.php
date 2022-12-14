<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\createDonnationRequest;
use App\Models\DonnationRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class DonnationController extends Controller
{
    public function index(){
        $donnationRequest = DonnationRequest::paginate();
        return responseJson('success','Donnation Requests Shown successfully', $donnationRequest);
    }

    public function add(createDonnationRequest $request){
    $donnationdata = $request->validated();
   $donnation =DonnationRequest::create($donnationdata);
    return responseJson('success','Donnation created successfully',$donnationdata);
    }
}
