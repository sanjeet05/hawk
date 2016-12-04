<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

// by sanjeet
use Validator;

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
    public function updateProfile(Request $request)
    {
      $userData = $request->all();
      // create the validation rules
      $rules = array(
          'name' => 'required',
          'email'=> 'required',
          'mobile' => 'required',
      );
      // validate against the inputs from our form
      $validator = Validator::make($userData, $rules);
      if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return response()->json(['result'=>$messages]);
        }
      else{
        return response()->json(['result' => 'updateProfile']);
      }

    }
}
