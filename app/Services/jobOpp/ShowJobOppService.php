<?php
namespace App\Services\jobOpp;

use App\Models\city;
use App\Models\company;
use App\Models\EducationLevel;
use App\Models\job_opp;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\JobTitle;
use App\Models\Save_job_oppertunity;
use Laravel\Sanctum\PersonalAccessToken;

class ShowJobOppService
{
    public function show($request, $id)
    {
        // $token = PersonalAccessToken::findToken($request->bearerToken());
        // $user = $token->tokenable;
        // if (!$user) {
        //     return [
        //         'message' => 'not authorized',
        //         'data' => []
        //     ];
        // }
        $job = job_opp::find($id);
        if ($job) {

            $company = company::where('id', $job['company_id'])->first();
            $job['company_name'] = $company['name'];

            $city = city::where('id', $job['city_id'])->first();
            $job['city_name'] = $city['name'];

            $level = JobLevel::where('id', $job['job_level_id'])->first();
            $job['job_level_name'] = $level['name'];

            $title = JobTitle::where('id', $job['job_title_id'])->first();
            $job['job_title_name'] = $title['name'];

            $industry = JobIndustry::where('id', $job['job_idustry_id'])->first();
            $job['job_industry_name'] = $industry['name'];

            $edu = EducationLevel::where('id', $job['education_level_id'])->first();
            $job['edu_level_name'] = $edu['name'];

            $time = JobTimeType::where('id', $job['job_type_id'])->first();
            $job['time_type_name'] = $time['name'];

            $job['company_logo'] = $company['logo'];

            return [
                'message' => 'found',
                'data' => $job
            ];
        } else {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
    }
    public function show_all($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if (!$user) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $jobs = job_opp::get();

        $saved = Save_job_oppertunity::where('employee_id', $user['id'])->get();
        $saved_ids = [];
        foreach ($saved as $one) {
            array_push($saved_ids, $one['job_oppertunity_id']);
        }

        foreach ($jobs as $job) {

            $company = company::where('id', $job['company_id'])->first();
            $job['company_name'] = $company['name'];

            $city = city::where('id', $job['city_id'])->first();
            $job['city_name'] = $city['name'];

            $level = JobLevel::where('id', $job['job_level_id'])->first();
            $job['job_level_name'] = $level['name'];

            $title = JobTitle::where('id', $job['job_title_id'])->first();
            $job['job_title_name'] = $title['name'];

            $industry = JobIndustry::where('id', $job['job_idustry_id'])->first();
            $job['job_industry_name'] = $industry['name'];

            $edu = EducationLevel::where('id', $job['education_level_id'])->first();
            $job['edu_level_name'] = $edu['name'];

            $time = JobTimeType::where('id', $job['job_type_id'])->first();
            $job['time_type_name'] = $time['name'];

            $job['is_saved'] = in_array($job['id'], $saved_ids);
        }
        return [
            'message' => 'found',
            'data' => $jobs
        ];
    }
}