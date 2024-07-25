<?php

namespace Database\Seeders;

use App\Models\JobTimeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTimeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobTimeType::create([
            'name'=> 'full time',
          ]);   

          JobTimeType::create([
            'name'=> 'part time',
          ]);   

          JobTimeType::create([
            'name'=> 'Freelance',
          ]);   

          JobTimeType::create([
            'name'=> 'Flexible time',
          ]);   




    }
}
