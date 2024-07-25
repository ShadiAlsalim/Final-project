<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_company extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'company_id'
    ];

}
