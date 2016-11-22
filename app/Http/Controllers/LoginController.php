<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends ApiController
{
  public function index(){
    return $this->response('sanjeet');
    // return 'hello';
  }

}
