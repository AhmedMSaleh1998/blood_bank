<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\DonnationRequest;
use Illuminate\Http\Request;

class DonnationRequestController extends Controller
{
    public function index(){
        $donnationRequests = DonnationRequest::paginate(10);
        return view('web.donnationRequest.index',compact('donnationRequests'));
    }
}
