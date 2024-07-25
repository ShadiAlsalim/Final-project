<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\UnSaveJobOppService;
use Throwable;
use Illuminate\Http\Request;

class unsaveJobOppControllers extends Controller
{
    private UnSaveJobOppService $UnSaveJobOpp;
    public function __construct(UnSaveJobOppService $UnSaveJobOpp)
    {
      $this->UnSaveJobOpp = $UnSaveJobOpp;
    }
  
    public function UnSaveJobOpp (Request $request,$id)
    {
        try {
          $data = $this->UnSaveJobOpp->UnSaveJobOpp($id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
