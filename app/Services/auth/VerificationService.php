<?php

namespace App\Services\auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class VerificationService 
{
        public function verification($request)
        {  
          $user =User::where('email',$request['email'])->first();
          if($user){
          return ['massage'=>"The email has already been taken.", 'data'=>[]];}
            
        $data = ([ 
            'email'=>$request['email'],
            'password'=>$request['password'],
            'role'=>$request['role']
          ]);

       $verificationCode = rand(10000,99999);
       $data['verificationCode'] = "{$verificationCode}";

       Mail::raw("Your verification code is: {$verificationCode}", function ($message) use ($request) {
        $message->from('mhd654mhd653@gmail.com', 'BalaWasta')
                ->to($request['email'])
                ->subject(' Verification Code ');
    });
    
      return [ 'massage'=>'check your email ' , 'data'=>$data];

    }
  }