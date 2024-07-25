<?php
namespace App\Services\company;

use App\Models\company;
use App\Models\city;
use App\Models\EducationLevel;
use App\Models\job_opp;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\JobTitle;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class ShowCompanyJobOppsService
{
    public function Show($request, $id)
    {
        // $token = PersonalAccessToken::findToken($request->bearerToken());
        // $user = $token->tokenable;
        $jobs = job_opp::where('company_id', $id)->get();
        if (!$jobs) {
            $jobs = [];
        } else {
            // print($jobs);
            foreach ($jobs as $job) {
                $company = company::find($job['company_id']);
                $job['company_id'] = $company['name'];

                $city = city::find($job['city_id']);
                $job['city_id'] = $city['name'];

                $job_level = JobLevel::find($job['job_level_id']);
                $job['job_level_id'] = $job_level['name'];

                $job_title = JobTitle::find($job['job_title_id']);
                $job['job_title_id'] = $job_title['name'];

                $job_industry = JobIndustry::find($job['job_idustry_id']);
                $job['job_idustry_id'] = $job_industry['name'];

                $edu_level = EducationLevel::find($job['education_level_id']);
                $job['education_level_id'] = $edu_level['name'];

                $job_time = JobTimeType::find($job['job_type_id']);
                $job['job_type_id'] = $job_time['name'];

                $job['company_logo'] = $company['logo'];
                $job['company_name'] = $company['name'];
            }
        }
        return [
            'message' => 'found',
            'data' => $jobs
        ];
    }
}