<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\JobLevel;
use App\Models\User;
use App\Models\company;
use App\Models\employee;
use App\Models\Interests;
use App\Models\JobTitle;
use App\Models\EducationLevel;
use App\Models\Language;
use App\Models\JobIndustry;
use App\Models\JobTimeType;
use App\Models\LanguageLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class dataControllers extends Controller
{
    public function city()
    {
        $city = city::pluck('name');
        return $city;
    }

    public function jobTitle()
    {
        $jobTitle = JobTitle::pluck('name');
        return $jobTitle;
    }

    public function language()
    {
        $language = Language::pluck('name');
        return $language;
    }

    public function languageLevel()
    {
        $LanguageLevel = LanguageLevel::pluck('level');
        return $LanguageLevel;
    }

    public function Interests()
    {
        $Interests = JobIndustry::pluck('name');
        return $Interests;
    }

    public function JobTimeType()
    {
        $JobTimeType = JobTimeType::pluck('name');
        return $JobTimeType;
    }

    public function EducationLevel()
    {
        $EducationLevel = EducationLevel::pluck('name');
        return $EducationLevel;
    }

    public function JobIndustry()
    {
        $JobIndustry = JobIndustry::pluck('name');
        return $JobIndustry;
    }

    public function alldata()
    {
        return [
            'jobTitle' => JobTitle::pluck('name'),
            'language' => Language::pluck('name'),
            // 'Interests' => Interests::pluck('name'),
            'LanguageLevel' => LanguageLevel::pluck('level'),
            'EducationLevel' => EducationLevel::pluck('name'),
            'JobIndustry' => JobIndustry::pluck('name'),
            'JobTimeType' => JobTimeType::pluck('name'),
            'city' => city::pluck('name'),
            'JobLevel' => JobLevel::pluck('name'),
        ];
    }


    public function profile()
    {

        $user = Auth::user();
        $employee = employee::where('user_id', $user->id)->first();

        $profile = DB::table('employees')
            ->where('employees.id', $employee->id)
            ->leftJoin('cities', 'cities.id', '=', 'employees.city_id')
            ->get();

        $WorkExperiences = DB::table('work_experiences')
            ->where('work_experiences.employee_id', $employee->id)
            ->leftJoin('job_titles', 'job_titles.id', '=', 'work_experiences.job_title_id')
            ->get(['work_experiences.id', 'employee_id', 'name as job_title', 'company_name', 'start_date', 'end_date', 'description']);

        $educational_certificates = DB::table('educational_certificates')
            ->where('educational_certificates.employee_id', $employee->id)
            ->leftJoin('education_levels', 'education_levels.id', '=', 'educational_certificates.education_level_id')
            ->get(['educational_certificates.id', 'employee_id', 'name as education_level', 'source', 'given_date']);

        $language_and_levels = DB::table('language_and_levels')
            ->where('language_and_levels.employee_id', $employee->id)
            ->leftJoin('languages', 'languages.id', '=', 'language_and_levels.language_id')
            ->leftJoin('language_levels', 'language_levels.id', '=', 'language_and_levels.language_level_id')
            ->get(['language_and_levels.id', 'employee_id', 'name as language', 'level']);

        return [
            'profile' => $profile,
            'WorkExperiences' => $WorkExperiences,
            'educational_certificates' => $educational_certificates,
            'language_and_levels' => $language_and_levels
        ];

    }


}
