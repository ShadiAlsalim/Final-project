<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Services\auth\LogoutService;
use App\Http\Responses\ResponseService;
use Illuminate\Http\Request;
use Throwable;


class LogoutControllers extends Controller
{
    private LogoutService $logout;
   public function __construct(LogoutService $logout)
   {
     $this->logout = $logout;
   }
 
   public function logout (Request $request)
   {
       try {
         $data = $this->logout->logout($request);
         return ResponseService::success($data['massage'] , $data['data']);
       }
     
       catch (Throwable $error) {
         return ResponseService::error( 'An error occurred' , $error->getMessage() );
       }
  } 
}
