<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobTitle::create([
            'name'=> 'Administrative Assistant',
          ]);   
        JobTitle::create([
            'name'=> 'Office Assistant',
          ]);   
        JobTitle::create([
            'name'=> 'Data Entry Clerk',
          ]);   
        JobTitle::create([
            'name'=> 'Sales Manager',
          ]);   
        JobTitle::create([
            'name'=> 'Software Engineer',
          ]);   
        JobTitle::create([
            'name'=> 'Nurse Practitioner',
          ]);   
        JobTitle::create([
            'name'=> 'Marketing Manager',
          ]);   
        JobTitle::create([
            'name'=> 'Executive Assistant',
          ]);   


        
    }
}
