<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\CancelApplyService;
use Throwable;
use Illuminate\Http\Request;

class CancelApplayControllers extends Controller
{
    private CancelApplyService $CancelApply;
    public function __construct(CancelApplyService $CancelApply)
    {
      $this->CancelApply = $CancelApply;
    }
  
    public function CancelApply (Request $request,$id)
    {
        try {
          $data = $this->CancelApply->CancelApply($id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
