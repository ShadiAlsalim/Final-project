<?php
namespace App\Services\jobOpp;

use App\Models\job_opp;
use App\Models\company;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\city;
use App\Models\EducationLevel;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\JobTitle;
use Throwable;

class CreateJobOppService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if ($user['role'] == 'employee') {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $company = company::where('user_id', $user['id'])->first();

        if (!$company['approved']) {
            return [
                'message' => 'your company is not approved yet.',
                'data' => []
            ];
        }

        $city = city::where('name', $request['city'])->first();
        if (!$city) {
            return [
                'message' => 'city not found',
                'data' => []
            ];
        }
        $job_level_id = JobLevel::where('name', $request['job_level'])->first();
        if (!$job_level_id) {
            return [
                'message' => 'job level not found',
                'data' => []
            ];
        }
        $job_title_id = JobTitle::where('name', $request['job_title'])->first();
        if (!$job_title_id) {
            return [
                'message' => 'job title not found',
                'data' => []
            ];
        }
        $job_industry_id = JobIndustry::where('name', $request['job_idustry'])->first();
        if (!$job_industry_id) {
            return [
                'message' => 'job industry not found',
                'data' => []
            ];
        }
        $education_level_id = EducationLevel::where('name', $request['education_level'])->first();
        if (!$education_level_id) {
            return [
                'message' => 'education level not found',
                'data' => []
            ];
        }
        $job_type_id = JobTimeType::where('name', $request['job_time_type'])->first();
        if (!$job_type_id) {
            return [
                'message' => 'job time type not found',
                'data' => []
            ];
        }
        $new_job = job_opp::create([
            'job_description' => $request['job_description'],
            'job_requirements' => $request['job_requirements'],
            'name' => $request['name'],
            'number_of_vacancies' => $request['number_of_vacancies'],
            'years_of_experiences' => $request['years_of_experiences'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'job_type' => $request['job_type'],
            'portfolio_check' => $request['portfolio_check'],
            'min_age' => $request['min_age'],
            'max_age' => $request['max_age'],
            'salary' => $request['salary'],
            'company_id' => $company['id'],
            'city_id' => $city['id'],
            'job_level_id' => $job_level_id['id'],
            'job_title_id' => $job_title_id['id'],
            'job_idustry_id' => $job_industry_id['id'],
            'education_level_id' => $education_level_id['id'],
            'job_type_id' => $job_type_id['id']
        ]);
        $copy = [
            'id' => $new_job['id'],
            'job_description' => $request['job_description'],
            'job_requirements' => $request['job_requirements'],
            'name' => $request['name'],
            'number_of_vacancies' => $request['number_of_vacancies'],
            'years_of_experiences' => $request['years_of_experiences'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'job_type' => $request['job_type'],
            'portfolio_check' => $request['portfolio_check'],
            'min_age' => $request['min_age'],
            'max_age' => $request['max_age'],
            'salary' => $request['salary'],
            'company_id' => $company['id'],
            'city' => $city['name'],
            'job_level' => $job_level_id['name'],
            'job_title' => $job_title_id['name'],
            'job_idustry' => $job_industry_id['name'],
            'education_level' => $education_level_id['name'],
            'job_time_type' => $job_type_id['name']
        ];
        return [
            'message' => 'created',
            'data' => $copy
        ];
        //]);
    }
}