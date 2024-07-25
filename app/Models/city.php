<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class city extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function employee (){
        return $this->hasMany(employee::class);
    }

    public function JobOppertunity (){
        return $this->hasMany(JobOppertunity::class);
    }

    
}
