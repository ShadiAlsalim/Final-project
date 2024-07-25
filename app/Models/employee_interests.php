<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_interests extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'interest_id'
    ];
    
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function Interests()
    {
        return $this->belongsToMany(Interests::class);
    }
    
}
