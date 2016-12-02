<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminHomeController extends ApiController
{
    //
    public function getAllUsers()
    {
      $allUsers = $this->getUsers();
      return response()->json(['result' => $allUsers]);
    }
}
