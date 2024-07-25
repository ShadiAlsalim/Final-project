<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
    ];
    public function level(){
        return $this->hasMany(LanguageAndLevel::class); 
    }
}
