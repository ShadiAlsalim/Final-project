<?php

namespace App\Http\Controllers\jobOpp;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\FilteringJobOppService;
use Illuminate\Http\Request;
use Throwable;

class FilteringJobOppControllers extends Controller
{
    private FilteringJobOppService $FilteringJobOpp;
    public function __construct(FilteringJobOppService $FilteringJobOpp)
    {
      $this->FilteringJobOpp = $FilteringJobOpp;
    }
  
    public function FilteringJobOpp (Request $request)
    {
        try {
          $data = $this->FilteringJobOpp->FilteringJobOpp($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 

}
