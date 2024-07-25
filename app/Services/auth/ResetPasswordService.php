<?php

namespace App\Services\auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ResetPasswordService   
{
    public function resetPassword( $request){ 
      $user=User::where('email',$request->email)->first();
          if($user) {
          $user->update([
              'password' => Hash::make($request->password),
          ]);
      $message = 'updated ';}
      else {
        $user=[];
      $message = 'wrong email ';}
      unset($user->email_verified_at  , $user->name , $user->id , $user->updated_at , $user->created_at); // to except roles and permission from json return 
      return [ 'massage'=> $message, 'data'=>$user];
      }

}