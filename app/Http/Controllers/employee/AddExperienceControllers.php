<?php

namespace App\Http\Controllers\employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\AddExperiencesService;
use Throwable;


class AddExperienceControllers extends Controller
{
    private AddExperiencesService $AddExperience;
    public function __construct(AddExperiencesService $AddExperience)
    {
      $this->AddExperience = $AddExperience;
    }
  
    public function AddExperience (AddExperienceRequest $request)
    {
        try {
          $data = $this->AddExperience->AddExperience($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
 

}
