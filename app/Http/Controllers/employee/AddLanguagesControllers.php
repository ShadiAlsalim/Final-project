<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\AddLanguagesService;
use Throwable;
use Illuminate\Http\Request;

class AddLanguagesControllers extends Controller
{
    private AddLanguagesService $AddLanguages;
    public function __construct(AddLanguagesService $AddLanguages)
    {
      $this->AddLanguages = $AddLanguages;
    }
  
    public function AddLanguages (AddLanguagesRequest $request)
    {
        try {
          $data = $this->AddLanguages->AddLanguages($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 

}
