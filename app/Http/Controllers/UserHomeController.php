<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

// by sanjeet
use Validator;

class UserHomeController extends ApiController
{
    // get user info
    public function getUserDetails(Request $request)
    {
        if($request->has('email')){
          $email=$request->input('email');
          $userInfo=$this->getUserDetailsByEmail($email);
          return response()->json(['result'=>$userInfo]);
        }
        else{
          return response()->json(['error'=>"please provide your email!"], 400);
        }
    }

    // update user profile
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
        $email = $request->get('email');
        $name = $request->get('name');
        $mobile= $request->get('mobile');
        $data = ['name' => $name, 'mobile'=>$mobile];
        $updateUser= $this->updateUserByEmail($email, $data);
        if($updateUser){
          return response()->json(['result' => 'profile has been updated']);
        }
        return response()->json(['result' => 'did not chanage anythings!']);
      }

    }

    // change user password
    public function changePassword(Request $request)
    {
      if($request->has('email')){
        if($request->has('password')){
          $email = $this->getUserIdByEmail($request->get('email'));
          if($email){
            $password = bcrypt($request->get('password'));
            $data = ['password'=> $password];
            $changePassword= $this->changePasswordByEmail($email, $data);
            if($changePassword){
              return response()->json(['result' => 'password has been changed']);
            }
            return response()->json(['result' => 'did not chnange password']);
          }
          else{
            return response()->json(['error' => 'user does not exit!'], 400);
          }
        }
        else{
          return response()->json(['error' => 'please provide your password!'], 400);
        }
      }
      else{
        return response()->json(['error' => 'please provide your email!'], 400);
      }
    }
}
