<?php
namespace App\Services\company;

use App\Models\JobIndustry;
use App\Models\User;
use App\Models\company;
use App\Models\job_opp;
use App\Models\city;
use App\Models\EducationLevel;
use App\Models\JobTitle;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class ShowCompanyService
{
    public function show($request, $id)
    {
        $company = company::find($id);
        $industry = JobIndustry::find($company['job_idustry_id']);
        $company['job_idustry_id'] = $industry['name'];
        if ($company) {
            return [
                'message' => 'found',
                'data' => $company
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
        $company = company::get();
        if ($company) {
            foreach ($company as $one) {
                $industry = JobIndustry::find($one['job_idustry_id']);
                $one['job_idustry_id'] = $industry['name'];
            }
            return [
                'message' => 'found',
                'data' => $company
            ];
        } else {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
    }
    public function showFromToken($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;

        if (!$user->hasRole('company')) {
            return [
                'message' => 'not a company',
                'data' => []
            ];
        }

        $company = company::where('user_id', $user['id'])->first();
        $industry = JobIndustry::find($company['job_idustry_id']);
        $company['job_idustry_id'] = $industry['name'];
        return [
            'message' => 'found',
            'data' => $company
        ];
    }

    public function showJobsFromToken($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;

        if (!$user->hasRole('company')) {
            return [
                'message' => 'not a company',
                'data' => []
            ];
        }

        $company = company::where('user_id', $user['id'])->first();
        $jobs = job_opp::where('company_id', $company['id'])->get();
        $industry = JobIndustry::find($company['job_idustry_id']);
        $company['job_idustry_id'] = $industry['name'];
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

        }

        return [
            'message' => 'found',
            'data' => $jobs
        ];
    }
}