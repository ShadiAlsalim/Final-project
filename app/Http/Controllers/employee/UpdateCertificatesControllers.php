<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\UpdateCertificatesService;
use Throwable;
use Illuminate\Http\Request;

class UpdateCertificatesControllers extends Controller
{
    private UpdateCertificatesService $update;
    public function __construct(UpdateCertificatesService $update)
    {
      $this->update = $update;
    }
  
    public function UpdateCertificates (AddExperienceRequest $request , $id)
    {
        try {
          $data = $this->update->updateCertificates($request , $id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
 
}
