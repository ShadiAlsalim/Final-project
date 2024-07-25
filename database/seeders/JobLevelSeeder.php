<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobLevel::create([
            'name'=> 'junior',
          ]); 
        JobLevel::create([
            'name'=> 'senior',
          ]); 
        JobLevel::create([
            'name'=> 'semi_senior',
          ]); 
    }
}
