<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\SearchService;
use Throwable;

class SearchControllers extends Controller
{
    private  SearchService $SearchService;
    public function __construct(SearchService $SearchService)
    {
      $this->SearchService = $SearchService;
    }
  
    public function Search (Request $request)
    {
        try {
          $data = $this->SearchService->search($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
