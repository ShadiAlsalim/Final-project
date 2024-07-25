<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'first_name',
        'last_name',
        'phone_number' ,
        'gender',
        'date_of_birth',
        'portfolio_link',
        'military_check',
        'city_id',
        'image',
        'github_link',
        'linkedin_link',
        'facebook_link',
        'work_email',
        // 'skills',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function user(){  // telling phone model that he's related to user table
        return $this->belongsTo(User::class);
    }

    public function city (){
        return $this->belongsTo(city::class);
    }

    public function EducationLevel (){
        return $this->belongsTo(EducationLevel::class);
    }

    public function JobIndustry (){
        return $this->belongsTo(JobIndustry::class);
    }

    public function JobLevel (){
        return $this->belongsTo(JobLevel::class);
    }
    
    public function JobTitle (){
        return $this->belongsTo(JobTitle::class);
    }

    public function Interests(){
        return $this->belongsToMany(Interests::class); 
    }

    public function Employee_jobOpp(){
        return $this->belongsToMany(Employee_jobOpp::class); 
    }

    public function languages(){
        return $this->hasMany(LanguageAndLevel::class);  
    }

    public function EducationalCertificates(){
        return $this->hasMany(EducationalCertificates::class); 
    }

    public function WorkExperiences (){
        return $this->hasMany(WorkExperiences::class);
    }
    
    public function jobOpportunities()
{
    return $this->belongsToMany(job_opp::class, 'employee_job_opps');
}


}
