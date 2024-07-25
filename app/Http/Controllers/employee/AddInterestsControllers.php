<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddInterestsRequest;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseService;
use App\Services\employee\AddInterestsService;
use Throwable;


class AddInterestsControllers extends Controller
{
    private AddInterestsService $AddInterests;
    public function __construct(AddInterestsService $AddInterests)
    {
      $this->AddInterests = $AddInterests;
    }
  
    public function AddInterests (AddInterestsRequest $request)
    {
        try {
          $data = $this->AddInterests->AddInterests($request);
          return ResponseService::success($data['massage'] , $data['interests']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 

}
