<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_idustry_id',
        'address',
        'description',
        'website',
        'mobile_number',
        'approved',
        'logo',
        'banner'
    ];


    public function user()
    {  // telling phone model that he's related to user table
        return $this->belongsTo(User::class);
    }

    public function JobIndustry()
    {
        return $this->belongsTo(JobIndustry::class);
    }

    public function JobOppertunity()
    {
        return $this->hasMany(job_opp::class);
    }
}