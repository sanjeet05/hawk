<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// by sanjeet
use Validator;

class AdminHomeController extends ApiController
{
    // get the all user list
    public function getAllUsers()
    {
      $allUsers = $this->getUsers();
      return response()->json(['result' => $allUsers]);
    }

    // update the user profile
    public function updateUser(Request $request)
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

    // delete the user profile
    public function deleteUser(Request $request)
    {
        if($request->has('email')){
          $id = $this->getUserIdByEmail($request->get('email'));
          if($id){
            $deleteUser=$this->deleteUserByEmail($id);
            if($deleteUser){
              return response()->json(['result' => 'user has been deleted!']);
            }
            return response()->json(['error' => 'database error!'], 400);
          }
          else{
            return response()->json(['error' => 'user does not exit!'], 400);
          }
        }
        else{
          return response()->json(['error' => 'please provide your email!'], 400);
        }
    }

    // chnage the admin password
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
