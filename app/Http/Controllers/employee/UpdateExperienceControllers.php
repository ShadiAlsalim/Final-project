<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseService;
use App\Services\employee\UpdateExperienceService;
use Throwable;

class UpdateExperienceControllers extends Controller
{
    private UpdateExperienceService $Update;
    public function __construct(UpdateExperienceService $Update)
    {
      $this->Update = $Update;
    }
  
    public function UpdateExperience (AddExperienceRequest $request , $id)
    {
        try {
          $data = $this->Update->UpdateExperience($request , $id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }

        return 'anythng';
    }
}
