<?php

namespace Database\Seeders;

use App\Models\Interests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interests::create([
            'name'=> 'Medicine',
          ]);   
        Interests::create([
            'name'=> 'Engineering',
          ]);   
        Interests::create([
            'name'=> 'Technology',
          ]);   
        Interests::create([
            'name'=> 'Finance',
          ]);   
        Interests::create([
            'name'=> 'Writing',
          ]);   
        Interests::create([
            'name'=> 'Operations',
          ]);   
        Interests::create([
            'name'=> 'Sales',
          ]);   
        Interests::create([
            'name'=> 'Designing',
          ]);   
        Interests::create([
            'name'=> 'Photography',
          ]);   
    }
}
