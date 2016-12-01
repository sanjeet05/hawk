<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminHomeController extends ApiController
{
    //
    public function getAllUsers()
    {
      $all_users = $this->getUsers();
      return response()->json(['result' => $all_users]);
    }
}
