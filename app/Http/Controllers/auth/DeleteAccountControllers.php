<?php
namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Services\auth\DeleteAccountService;
use App\Http\Responses\ResponseService;
use Illuminate\Http\Request;
use Throwable;

class DeleteAccountControllers extends Controller
{
    private DeleteAccountService $deleteaccount;
   public function __construct(DeleteAccountService $deleteaccount)
   {
     $this->deleteaccount = $deleteaccount;
   }
 
   public function delete (Request $request)
   {
       try {
         $data = $this->deleteaccount->delete($request);
         return ResponseService::success($data['massage'] , $data['data']);
       }
       catch (Throwable $error) {
         return ResponseService::error( 'An error occurred' , $error->getMessage() );
       }
  } 
}


// return response()->json(['message'=> ' ' , 'data' =>[ ] ],status);