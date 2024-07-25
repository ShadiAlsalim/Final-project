<?php

namespace App\Services\auth;
use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Spatie\Permission\Models\Role ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
        public function register($request) 
        { 
       $user =User::where('email',$request['email'])->first();
       if(!$user) {
        $user = User::create([ 
          'email'=>$request['email'],
          'password'=>Hash::make($request['password']),
          'role'=>$request['role']  //employee and company only
        ]);

        // create a role for the user
          $role_type=Role::query()->where('name',$request['role'])->first();
          $user->assignRole($role_type);
          $permissions = $role_type->permissions()->pluck('name')->toArray();
          $user ->givePermissionTo($permissions); 
          $user->load('roles','permissions'); //to recognize the permissions

        //create an employee/company profile with the user account
        if($request['role'] == "employee"){
            employee::create([
            'user_id' => $user->id,
                ]);
             }
        else if($request['role'] == "company"){
            company::create([
            'user_id' => $user->id,
                ]);
            }

          $token =$user->createToken("employee_token")->plainTextToken ;

        $user['role'] = "{$role_type->name}";
        $user['token'] = "{$token}";
        unset($user->roles , $user->permissions , $user->id , $user->updated_at , $user->created_at); // to except roles and permission from json return 
        return ['message'=>'created' ,'user' => $user] ;
          }

        else 
        return ['message'=>'The email has already been taken.' , 'user'=>[]] ;     

    }
  }
