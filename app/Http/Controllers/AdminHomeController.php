<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// by sanjeet
use Validator;

class AdminHomeController extends ApiController
{
    //
    public function getAllUsers()
    {
      $allUsers = $this->getUsers();
      return response()->json(['result' => $allUsers]);
    }
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
        return response()->json(['error' => 'database error!'], 400);
      }

      return response()->json(['result' => 'edit']);
    }
    public function deleteUser(Request $request)
    {
      if($request->has('email')){
        $id = $this->getUserIdByEmail($request->get('email'));
        if(!$id){
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
        return response()->json(['error' => 'please provide email!'], 400);
      }

    }
}
