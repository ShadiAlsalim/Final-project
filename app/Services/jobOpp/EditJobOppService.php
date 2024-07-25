<?php
namespace App\Services;

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

class EditJobOppService
{
    public function edit($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if ($user['role'] == 'employee') {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $job_opp = job_opp::find($id);
        if (!$job_opp) {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
        $company = Company::find($request['company_id']);
        if (!$company) {
            return [
                'message' => 'company not found',
                'data' => []
            ];
        }
        $city = city::find($request['city_id']);
        if (!$city) {
            return [
                'message' => 'city not found',
                'data' => []
            ];
        }
        $job_level_id = JobLevel::find($request['job_level_id']);
        if (!$job_level_id) {
            return [
                'message' => 'job level not found',
                'data' => []
            ];
        }
        $job_title_id = JobTitle::find($request['job_title_id']);
        if (!$job_title_id) {
            return [
                'message' => 'job title not found',
                'data' => []
            ];
        }
        $job_idustry_id = JobIndustry::find($request['job_idustry_id']);
        if (!$job_idustry_id) {
            return [
                'message' => 'job industry not found',
                'data' => []
            ];
        }
        $education_level_id = EducationLevel::find($request['education_level_id']);
        if (!$education_level_id) {
            return [
                'message' => 'education level not found',
                'data' => []
            ];
        }
        $job_type_id = JobTimeType::find($request['job_type']);
        if (!$job_type_id) {
            return [
                'message' => 'job type not found',
                'data' => []
            ];
        }

        //changing Data:
        $job_opp['job_description'] = $request['job_description'];
        $job_opp['job_requirements'] = $request['job_requirements'];
        $job_opp['responsibility'] = $request['responsibility'];
        $job_opp['number_of_vacancies'] = $request['number_of_vacancies'];
        $job_opp['years_of_experiences'] = $request['years_of_experiences'];
        $job_opp['address'] = $request['address'];
        $job_opp['gender'] = $request['gender'];
        $job_opp['job_type'] = $request['job_type'];
        $job_opp['portfolio_check'] = $request['portfolio_check'];
        $job_opp['company_id'] = $company['id'];
        $job_opp['city_id'] = $city['id'];
        $job_opp['job_level_id'] = $job_level_id['id'];
        $job_opp['job_title_id'] = $job_title_id['id'];
        $job_opp['job_industry_id'] = $job_idustry_id['id'];
        $job_opp['education_level_id'] = $education_level_id['id'];
        $job_opp['job_type_id'] = $job_type_id['id'];

        //Saving changes to DataBase:
        $job_opp->save();
    }
}