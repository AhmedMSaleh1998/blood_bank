<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\contactUsRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactControllrer extends Controller
{
    public function contactUs(contactUsRequest $request){
        $contact = Contact::create([
            'tilte'     => $request->title,
            'message'   => $request->message,
            'client_id' => auth('api')->user()->id,
        ]);
        return responseJson('succes','contact stored successfully',$contact);
    }
}
