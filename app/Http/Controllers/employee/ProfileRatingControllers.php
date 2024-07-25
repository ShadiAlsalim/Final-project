<?php

namespace App\Http\Controllers\employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\employee\AddExperienceRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\ProfileRatingService;
use GuzzleHttp\Psr7\Request;
use Throwable;

class ProfileRatingControllers extends Controller
{
    private ProfileRatingService $profileRating;
    public function __construct(ProfileRatingService $profileRating)
    {
      $this->profileRating = $profileRating;
    }
  
    public function profileRating ()
    {
        try {
          $data = $this->profileRating->profileRating();
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   }
}
