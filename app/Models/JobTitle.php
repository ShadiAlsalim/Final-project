<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function employee (){
        return $this->hasMany(employee::class,'any_name_!');
    }

    public function JobOppertunity (){
        return $this->hasMany(job_opp::class,'any_name_!');
    }

    public function WorkExperiences (){
        return $this->hasMany(WorkExperiences::class,'any_name_!');
    }
}
