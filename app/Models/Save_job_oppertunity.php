<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save_job_oppertunity extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_oppertunity_id',
        'employee_id'
    ];
}
