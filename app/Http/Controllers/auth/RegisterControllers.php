<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Services\auth\RegisterService;
use App\Http\Responses\ResponseService;
use App\Http\Requests\auth\RegisterRequest;
use Throwable;


class RegisterControllers extends Controller
{
    private RegisterService $registerService;
    public function __construct(RegisterService $registerService)
    {
      $this->registerService = $registerService;
    }
  
    public function register(RegisterRequest $request)
    {
        try {
          $data = $this->registerService->register($request->validated());
          return ResponseService::success($data['message'] , $data['user']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
