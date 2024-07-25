<?php
namespace App\Services\auth;
use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;


class DeleteAccountService
{
    public function delete($request){
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable ; 
        user::destroy($user->id); 
        if($user->hasRole('company') ){
            company::destroy($user->id); 
        }
        else
            employee::destroy($user->id); 
     return [ 'massage'=>'deleted' , 'data'=>[]];
}

}