<?php

namespace Database\Seeders;

use App\Models\LanguageLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LanguageLevel::create([
            'level'=> 'A1',
          ]); 
        LanguageLevel::create([
            'level'=> 'A2',
          ]); 
        LanguageLevel::create([
            'level'=> 'B1',
          ]); 
        LanguageLevel::create([
            'level'=> 'B2',
          ]); 
        LanguageLevel::create([
            'level'=> 'C1',
          ]); 
    }
}
