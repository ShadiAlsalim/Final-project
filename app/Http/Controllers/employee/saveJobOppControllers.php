<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\SaveJobOppService;
use Throwable;
use Illuminate\Http\Request;

class saveJobOppControllers extends Controller
{
    private SaveJobOppService $SaveJobOpp;
    public function __construct(SaveJobOppService $SaveJobOpp)
    {
      $this->SaveJobOpp = $SaveJobOpp;
    }
  
    public function SaveJobOpp (Request $request,$id)
    {
        try {
          $data = $this->SaveJobOpp->SaveJobOpp($id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
