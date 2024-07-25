<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\JobApplayService;
use Throwable;
use Illuminate\Http\Request;

class JobApplayControllers extends Controller
{
    private JobApplayService $JobApplay;
    public function __construct(JobApplayService $JobApplay)
    {
      $this->JobApplay = $JobApplay;
    }
  
    public function JobApplay (Request $request,$id)
    {
        try {
          $data = $this->JobApplay->JobApplay($id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
