<?php

namespace App\Services\auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ResendCodeService
{
    public function resendCode($request){
    
        $verificationCode = rand(10000,99999);
        $data['verificationCode'] = "{$verificationCode}";
        Mail::raw("Your verification code is: {$verificationCode}", function ($message) use ($request) {
         $message->from('mhd654mhd653@gmail.com', 'BlaWasta')
                 ->to($request['email'])
                 ->subject(' Verification Code ');
     });

     $user['verificationCode'] = "{$verificationCode}";
     $user['email'] = "{$request['email']}";

     return [ 'massage'=>'check your email ' , 'data'=>$user];



}

}