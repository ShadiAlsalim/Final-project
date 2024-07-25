<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\ReturnJobOppAppliedService;
use Illuminate\Http\Request;
use Throwable;

class ReturnJobOppAppliedControllers extends Controller
{
    private ReturnJobOppAppliedService $ReturnJobOppAppliedService;
    public function __construct(ReturnJobOppAppliedService $ReturnJobOppAppliedService)
    {
      $this->ReturnJobOppAppliedService = $ReturnJobOppAppliedService;
    }
  
    public function ReturnOppApplied (Request $request,$id)
    {
        try {
          $data = $this->ReturnJobOppAppliedService->ReturnOppApplied($id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
