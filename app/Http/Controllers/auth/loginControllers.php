<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Services\auth\LoginService;
use App\Http\Responses\ResponseService;
use App\Http\Requests\auth\LoginRequest;
use Throwable;


class LoginControllers extends Controller
{
    private LoginService  $loginServices;
  public function __construct(LoginService $loginServices)
  {
    $this->loginServices  = $loginServices;
  }

  public function login(LoginRequest $request)
  {
    // $data = [];
    try {
      $data = $this->loginServices->login($request);  
      return ResponseService::success($data['massage'] , $data['data']);
    } 
    
    catch (Throwable $exception) {
      $massage=$exception->getMessage();
      return ResponseService::error( $massage , 'An error occurred' );
  }
}

}
