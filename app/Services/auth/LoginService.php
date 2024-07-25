<?php

namespace App\Services\auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function login($request)
    {

        $user = User::where('email', $request['email'])->first();
        if (!$user || !Auth::attempt($request->only(['email', 'password']))) {
            return ['massage' => "does not match our records", 'data' => []];
        } else {
            if ($user->role == "employee")
                $token = $user->createToken("employee_token")->plainTextToken;
            else if ($user->role == "company")
                $token = $user->createToken("company_token")->plainTextToken;
            else
                $token = $user->createToken("admin_token")->plainTextToken;
        }

        if ($user->hasRole('company')) {
            $role = 'company';
        } else if ($user->hasRole('employee'))
            $role = 'employee';
        else
            $role = 'admin';

        $user = [
            'email' => $user->email,
            'role' => $role,
            'token' => $token
        ];

        return ['massage' => 'loggedin succ', 'data' => $user];

    }

}