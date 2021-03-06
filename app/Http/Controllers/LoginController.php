<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//by sanjeet
use App\User;
use Hash;
use JWTAuth;
use Validator;

class LoginController extends ApiController
{
  public function signup(Request $request)
    {
      $user_data = $request->all();
      // create the validation rules ------------------------
      $rules = array(
          'name' => 'required',
          'email'=> 'required',
          'mobile' => 'required',
          'password' => 'required',
      );
      // validate against the inputs from our form
      $validator = Validator::make($user_data, $rules);
      if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return response()->json(['result'=>$messages]);
        }
        else{
            // call to getUserIdByEmail function to user is exits or not
            $id = $this->getUserIdByEmail($request->get('email'));
            if(!$id){
              $input = $request->all();
              $input['password'] = Hash::make($input['password']);
              User::create($input);
                return response()->json(['result'=>true]);
            }
            else{
              return response()->json(['result'=>false]);
            }
        }

    }

    public function login(Request $request)

    {
        $credentials = $request->only('email', 'password');

          try {
              // verify the credentials and create a token for the user
              if (! $token = JWTAuth::attempt($credentials)) {
                  return response()->json(['result' => 'invalid_credentials']);
              }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['result' => 'could_not_create_token'], 400);
            }
            // if no errors are encountered we can return a JWT
            // return response()->json(compact('token'));
            $user_name = $this->getUserNameByEmail($request->get('email'));
            $user_role = $this->getUserRoleByEmail($request->get('email'));
            $email=$request->get('email');
            if($user_role == 1) {
              return response()->json(['token' => $token, 'user_name'=>$user_name, 'email'=>$email, 'user_role'=>'admin']);
            }
            else
            {
              return response()->json(['token' => $token, 'user_name'=>$user_name, 'email'=>$email, 'user_role'=>'user']);
            }

    }

}
