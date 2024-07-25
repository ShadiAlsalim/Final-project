<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class createProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => '',
            'last_name' => '' , 
            'gender' => '' , 
            'phone_number' => '' , 
            'date_of_birth' => '' , 
            'city' => '',
            'military_check' => '',
            'work_email' => '',
            'portfolio_link' => '',
            'facebook_link' => '',
            'github_link' => '',
            'linkedin_link' => '',
            'skills' => '' , 
            ];
    }
}
