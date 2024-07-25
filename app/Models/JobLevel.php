<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    

    public function employee (){
        return $this->hasMany(employee::class);
    }

    public function JobOppertunity (){
        return $this->hasMany(job_opp::class);
    }
}
