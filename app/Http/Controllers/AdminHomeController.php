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
    public function editUser()
    {
      return response()->json(['result' => 'edit']);
    }
    public function deleteUser()
    {
      return response()->json(['result' => 'delete']);
    }
}
