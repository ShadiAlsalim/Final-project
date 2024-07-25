<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalCertificates extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_level_id' ,
        'source',
        'given_date',
        'employee_id',    
    ];

    public function EducationLevel (){
        return $this->belongsTo(EducationLevel::class);
    }

    public function employee (){
        return $this->belongsTo(employee::class);
    }

  
}
