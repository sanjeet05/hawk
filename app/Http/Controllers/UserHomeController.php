<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserHomeController extends ApiController
{
    public function getUserDetails(Request $request)
    {
      $email=$request->input('email');
      echo $email;
      $userInfo=$this->getUserDetailsByEmail($email);
      return response()->json(['result'=>$userInfo]);

      // if($request->has('email')){
      //   $email=$request->get('email');
      //   $userInfo=$this->getUserDetailsByEmail($email);
      //   return response()->json(['result'=>$userInfo]);
      // }
      // else{
      //   return response()->json(['result'=>"please provide email!"], 400);
      // }
    }
}
