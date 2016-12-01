<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminHomeController extends ApiController
{
    //
    public function getAllUsers(Request $request)
    {

      return response()->json(['result' => "all users"]);
    }
}
