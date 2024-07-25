<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class AddExperienceRequest extends FormRequest
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
            'job_title' => '' , 
            'company_name' => '' , 
            'start_date' => '' , 
            'end_date' => '' , 
            'description' => '' , 
        ];
    }
}
