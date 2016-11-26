<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends DatabaseSaverController
{
  /**
  *  code supposed to be used
  *  200 -> valid or ok
  *  401 -> invalid / expired
  *  403 -> Unauthoraized
  *  404 -> user not found
  *  500 -> server error
  **/
  protected $statusCode = 200;

  /**
   * @return mixed
   */
  public function getStatusCode()
  {
      return $this->statusCode;
  }

  /**
   * @param mixed $statusCode
   */
  public function setStatusCode($statusCode)
  {
      $this->statusCode = $statusCode;
  }

  /*
  / @param mixed $message
  / @return error message
  /
  */

  //  public function responseNotFound($message = 'Not Found'){
  //     $this->setStatusCode(404);
  //     return $this->responseWithError($message);
  // }

  /*
  / @param mixed message
  / @return error message with code
  /
  */
  public function responseWithError($message){
      return $this->response([
          'error' => [
              'data' => $message,
              'code' => 333,
          ]
      ]);
  }

  /*
  /  @param mixed message
  /  @return respond with message
  /
  */
  public function responseWithMessage($message){
      return $this->response([
          'message' => [
              'data' => $message,
              'code' => 666,
          ]
      ]);
  }

  /*
  /@param mixed message
  / @return json message
  /
  */

  public function response($data){
      return json_encode($data);
  }
}
