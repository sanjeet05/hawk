<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// added by sanjeet
use App\User;
use DB;

class DatabaseSaverController extends Controller
{
  // method to check user is already exit or not
  public function getUserIdByEmail($email){
      $user_info = User::where('email',$email)->first();
      return $user_info['email'];
  }
  // method to return the name of exits user
  public function getUserNameByEmail($email){
      $user_info = User::where('email',$email)->first();
      return $user_info['name'];
  }
  // method to return the user role of exits user
  public function getUserRoleByEmail($email){
      $user_info = User::where('email',$email)->first();
      return $user_info['roleId'];
  }

  // method to return to all users to admin
  public function getUsers(){
      // $user_info = User::all();
      // return $user_info;
      // $users = DB::table('users')->get();
      $users = DB::table('users')->select('name', 'email','mobile')->where('roleId', '0')->get();
      return $users;
  }
  public function getUserDetailsByEmail($email)
  {
    $users = DB::table('users')->select('name', 'email','mobile','password')->where('email', $email)->get();
    return $users;
  }
}
