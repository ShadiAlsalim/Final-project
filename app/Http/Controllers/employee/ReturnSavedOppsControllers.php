<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\ReturnDataService;
use Throwable;
use Illuminate\Http\Request;

class ReturnSavedOppsControllers extends Controller
{
    private ReturnDataService $ReturnDataService;
    public function __construct(ReturnDataService $ReturnDataService)
    {
      $this->ReturnDataService = $ReturnDataService;
    }
  
    public function ReturnAppliedOpp (){
        try {
          $data = $this->ReturnDataService->ReturnAppliedOpp();
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
} 

    public function ReturnSavedOpps (){
      try {
        $data = $this->ReturnDataService->ReturnSavedOpps();
        return ResponseService::success($data['massage'] , $data['data']);
      }
      catch (Throwable $error) {
        return ResponseService::error( 'An error occurred' , $error->getMessage() );
      }
} 
}
