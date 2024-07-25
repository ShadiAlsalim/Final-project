<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationLevel::create([
            'name'=> 'Bachelors Degree',
          ]);  

        EducationLevel::create([
            'name'=> 'University Degree',
          ]);

        EducationLevel::create([
            'name'=> 'Master Degree',
          ]);   

        EducationLevel::create([
            'name'=> 'Diploma',
          ]);   
        EducationLevel::create([
            'name'=> 'Doctorate Degree',
          ]);   
        EducationLevel::create([
            'name'=> 'other',
          ]);   
    }
    
}
