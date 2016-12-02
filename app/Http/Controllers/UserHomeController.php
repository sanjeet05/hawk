<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserHomeController extends ApiController
{
    public function getUserDetails(Request $request)
    {

      if($request->has('email')){
        $email=$request->input('email');
        $userInfo=$this->getUserDetailsByEmail($email);
        return response()->json(['result'=>$userInfo]);
      }
      else{
        return response()->json(['result'=>"please provide email!"], 400);
      }
    }
    public function editProfile()
    {
      return response()->json(['result' => 'editProfile']);
    }
}
