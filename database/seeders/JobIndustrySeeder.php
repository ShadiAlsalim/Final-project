<?php

namespace Database\Seeders;

use App\Models\JobIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobIndustry::create([
            'name'=> 'Technology',
          ]);   
        JobIndustry::create([
            'name'=> 'Education',
          ]);   
        JobIndustry::create([
            'name'=> 'Entertainment',
          ]);   
        JobIndustry::create([
            'name'=> 'Finance',
          ]);   
        JobIndustry::create([
            'name'=> 'Healthcare',
          ]);   
          JobIndustry::create([
            'name'=> 'Medicine',
          ]);   
          JobIndustry::create([
            'name'=> 'Engineering',
          ]);   
          JobIndustry::create([
            'name'=> 'Manufacturing',
          ]);   
          JobIndustry::create([
            'name'=> 'Retail',
          ]);   
          JobIndustry::create([
            'name'=> 'Sales',
          ]);   
          JobIndustry::create([
            'name'=> 'Designing',
          ]);   
          JobIndustry::create([
            'name'=> 'Government',
          ]);   
          JobIndustry::create([
            'name'=> 'other',
          ]); 
    }
}
