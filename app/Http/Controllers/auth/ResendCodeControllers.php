<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Services\auth\ResendCodeService;
use App\Http\Responses\ResponseService;
use Illuminate\Http\Request;
use Throwable;


class ResendCodeControllers extends Controller
{
   private ResendCodeService $resendcode;
   public function __construct(ResendCodeService $resendcode)
   {
     $this->resendcode = $resendcode;
   }
 
   public function resendCode (Request $request)
   {
       try {
         $data = $this->resendcode->resendCode($request);
         return ResponseService::success($data['massage'] , $data['data']);
       }
     
       catch (Throwable $error) {
         return ResponseService::error( 'An error occurred' , $error->getMessage() );
       }
  } 


}
