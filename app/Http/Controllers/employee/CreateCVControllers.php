<?php

namespace App\Http\Controllers\employee;
use App\Http\Controllers\Controller;
use App\Services\employee\CreateProfileService;
use App\Http\Responses\ResponseService;
use Illuminate\Http\Request;
use App\Http\Requests\employee\createProfileRequest;
use Throwable;

class CreateCVControllers extends Controller
{
    private CreateProfileService $createcv;
    public function __construct(CreateProfileService $createcv)
    {
      $this->createcv = $createcv;
    }
  
    public function createProfle (createProfileRequest $request)
    {
        try {
          $data = $this->createcv->createProfile($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
 

}
