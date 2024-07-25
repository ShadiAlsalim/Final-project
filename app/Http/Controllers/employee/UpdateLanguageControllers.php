<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddLanguagesRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\UpdateLanguageService;
use Throwable;
use Illuminate\Http\Request;

class UpdateLanguageControllers extends Controller
{
    private UpdateLanguageService $update;
    public function __construct(UpdateLanguageService $update)
    {
      $this->update = $update;
    }
  
    public function UpdateLanguage (AddLanguagesRequest $request , $id)
    {
        try {
          $data = $this->update->UpdateLanguage($request , $id);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 

}
