<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_oppertunity extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_type_id',
        'education_level_id',
        'job_idustry_id',
        'job_title_id',
        'job_level_id',
        'city_id',
        'company_id',
        'portfolio_check',
        'job_type',
        'gender',
        'years_of_experiences',
        'number_of_vacancies',
        'responsibility',
        'job_description',
        'address',
        'opp_name'
    ];
    public function company (){
        return $this->belongsTo(company::class);
    }

    public function city (){
        return $this->belongsTo(city::class);
    }

    public function EducationLevel (){
        return $this->belongsTo(EducationLevel::class);
    }

    public function JobLevel (){
        return $this->belongsTo(JobLevel::class);
    }

    public function JobTitle (){
        return $this->belongsTo(JobTitle::class);
    }

    public function JobTimeType (){
        return $this->belongsTo(JobTimeType::class);
    }

    public function JobIndustry (){
        return $this->belongsTo(JobIndustry::class);
    }

    public function employees()
    {
        return $this->belongsToMany(employee::class, 'employee_job_opps');
    }

    public function save_job_oppertunities()
    {
        return $this->belongsToMany(employee::class, 'save_job_oppertunities');
    }
    
    public function job_oppertunity_reasons()
    {
        return $this->belongsToMany(employee::class, 'job_oppertunity_reasons');
    }

    
}
