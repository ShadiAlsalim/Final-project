<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LanguageAndLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'language_id',
        'language_level_id',
    ];

    public function language (){
        return $this->belongsTo(Language::class);
    }

    public function language_level (){
        return $this->belongsTo(LanguageLevel::class);
    }

    public function employee (){
        return $this->belongsTo(employee::class);
    }
}
