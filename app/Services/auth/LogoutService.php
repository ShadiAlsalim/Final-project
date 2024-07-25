<?php

namespace App\Services\auth;
use Laravel\Sanctum\PersonalAccessToken;


class LogoutService
{
    public function logout($request){
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable ; 
        $user->tokens()->delete();
     return [ 'massage'=>'You are logged out ' , 'data'=>[]];



}

}