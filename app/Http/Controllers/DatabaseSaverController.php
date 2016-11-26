<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// added by sanjeet
use App\User;

class DatabaseSaverController extends Controller
{
  // method to check user is already exit or not
  public function getUserIdByEmail($email){
      $user_info = User::where('email',$email)->first();
      return $user_info['email'];
  }
  // method to return the name of exits user
  public function getUserNameByEmail($email){
      $user_name = User::where('email',$email)->first();
      return $user_name['name'];
  }
}
