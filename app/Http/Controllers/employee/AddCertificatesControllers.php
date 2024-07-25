<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddCertificateseRequest;
use Illuminate\Http\Request;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\AddCertificatesService;
use Throwable;


class AddCertificatesControllers extends Controller
{
    private AddCertificatesService $AddCertificates;
    public function __construct(AddCertificatesService $AddCertificates)
    {
      $this->AddCertificates = $AddCertificates;
    }
  
    public function AddCertificates (AddCertificateseRequest $request)
    {
        try {
          $data = $this->AddCertificates->AddCertificates($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
