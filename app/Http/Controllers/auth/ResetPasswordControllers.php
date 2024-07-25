<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Services\auth\ResetPasswordService;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseService;
use Throwable;

class ResetPasswordControllers extends Controller
{
    private ResetPasswordService $resetpassword;
    public function __construct(ResetPasswordService $resetpassword)
    {
      $this->resetpassword = $resetpassword;
    }
  
    public function resetpassword(Request $request)
    {
        try {
          $data = $this->resetpassword->resetPassword($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
