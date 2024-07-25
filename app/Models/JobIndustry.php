<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobIndustry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function employee (){
        return $this->hasMany(employee::class);
    }

    public function company (){
        return $this->hasMany(company::class);
    }

    public function JobOppertunity (){
        return $this->hasMany(job_opp::class);
    }
}
