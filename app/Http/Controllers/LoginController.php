<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//by sanjeet
use App\User;
use Hash;
use JWTAuth;

class LoginController extends ApiController
{
  public function signup(Request $request)
    {
      $input = $request->all();
      $input['password'] = Hash::make($input['password']);
      User::create($input);
        return response()->json(['result'=>true]);
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
                return response()->json(['result' => 'could_not_create_token'], 500);
            }
            // if no errors are encountered we can return a JWT
            return response()->json(compact('token'));
            // return response()->json(['token' => $token]);

      // $input = $request->all();
      //
      // if (!$token = JWTAuth::attempt($input)) {
      //
      //       return response()->json(['result' => 'wrong email or password.']);
      //
      //   }
      //
      //     return response()->json(['token' => $token]);

    }



public function get_user_details(Request $request)

{

  // $input = $request->all();
  //
  //  $user = JWTAuth::toUser($input['token']);
  //
  //   return response()->json(['result' => $user]);

  return response()->json(['result' => true]);

}

}
