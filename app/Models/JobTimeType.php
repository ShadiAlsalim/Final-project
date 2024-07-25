<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTimeType extends Model
{
    use HasFactory;

    public function JobOppertunity (){
        return $this->hasMany(job_opp::class);
    }
}
