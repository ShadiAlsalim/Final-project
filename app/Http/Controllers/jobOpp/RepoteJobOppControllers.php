<?php

namespace App\Http\Controllers\jobOpp;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\RepoteJobOppService;
use Illuminate\Http\Request;
use Throwable;

class RepoteJobOppControllers extends Controller
{
    private RepoteJobOppService $RepoteJobOppService;
    public function __construct(RepoteJobOppService $RepoteJobOppService)
    {
      $this->RepoteJobOppService = $RepoteJobOppService;
    }
  
    public function RepoteJobOpp (Request $request,$id)
    {
        try {
          $data = $this->RepoteJobOppService->RepoteJobOpp($request ,$id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
