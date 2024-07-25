<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobOppRequest extends FormRequest
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
            'job_description' => 'required',
            'job_requirements' => 'required',
            'responsibility' => 'required',
            'number_of_vacancies' => 'required',
            'years_of_experiences' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'job_type' => 'required',
            'portfolio_check' => 'required',
        ];
    }
}