<?php

namespace App\Http\Middleware;

use Closure;
// by sanjeet
use JWTAuth;
use Exception;
// ends
class authJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      try {
          //  $user = JWTAuth::toUser($request->input('token'));
          if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['result'=>'user_not_found'], 404);
            }
          }
      catch (Exception $e) {
          if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
              return response()->json(['result'=>'token_invalid'],$e->getStatusCode());
          }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
              return response()->json(['result'=>'token_expired'], $e->getStatusCode());
          }else{
              // return response()->json(['error'=>'Something is wrong']);
              return response()->json(['result'=>'token_absent'], $e->getStatusCode());
          }
        }

        // try {
        //     $user = JWTAuth::toUser($request->input('token'));
        //     // if (! $user = JWTAuth::parseToken()->authenticate()) {
        //     //     return response()->json(['user_not_found'], 404);
        //     // }
        //
        // } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        //
        //     return response()->json(['token_expired'], $e->getStatusCode());
        //
        // } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        //
        //     return response()->json(['token_invalid'], $e->getStatusCode());
        //
        // } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
        //
        //     return response()->json(['token_absent'], $e->getStatusCode());
        //
        // }

        return $next($request);
    }
}
