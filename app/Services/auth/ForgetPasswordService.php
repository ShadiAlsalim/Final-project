<?php

namespace App\Services\auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordService   
{
    public function forgetPassword($request){ 

        $user=User::where('email',$request->email)->first();
        if(!$user)
        $user=[];
        else
        {
        $verificationCode = rand(10000,99999);
        Mail::raw("Your verification code is: {$verificationCode}", function ($message) use ($request) {
        $message->from('mhd654mhd653@gmail.com', 'BlaWasta')
                ->to($request['email'])
                ->subject(' Verification Code ');
                
         });
         $user['verificationCode'] = "{$verificationCode}";

        }

        unset($user->email_verified_at  , $user->name , $user->id , $user->updated_at , $user->created_at); // to except roles and permission from json return 
        return [ 'massage'=>'we sent a code to your email ,If you do not receive a code, the email may not match an existing account' , 'data'=>$user];
            
  }

}