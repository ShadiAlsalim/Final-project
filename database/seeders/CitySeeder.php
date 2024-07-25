<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
    {
        city::create([
            'name'=> 'Damascus',
          ]);          
        city::create([
            'name'=> 'lattakia',
          ]);          
        city::create([
            'name'=> 'homs',
          ]);          
        city::create([
            'name'=> 'hama',
          ]);          
        city::create([
            'name'=> 'tartous',
          ]);          
        city::create([
            'name'=> 'aleppo',
          ]);          
        city::create([
            'name'=> 'other',
          ]);          
    }
    
}
