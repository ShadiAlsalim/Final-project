<?php

namespace App\Http\Controllers\auth;
use App\Http\Requests\auth\forgetPasswordRequest;
use App\Services\auth\ForgetPasswordService;
use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use Throwable;

class ForgetPasswordControllers extends Controller
{
    private ForgetPasswordService  $ForgetPasswordService;
    public function __construct(ForgetPasswordService $ForgetPasswordService)
    {
      $this->ForgetPasswordService  = $ForgetPasswordService;
    }
  
    public function forgetPassword(forgetPasswordRequest $request)
    {
      // $data = [];
      try {
        $data = $this->ForgetPasswordService->forgetPassword($request);

        return ResponseService::success($data['massage'] , $data['data']);
      } 
      
      catch (Throwable $exception) {
        $massage=$exception->getMessage();
        return ResponseService::error( $massage , 'An error occurred' );
    }
  }
  





















 

}
