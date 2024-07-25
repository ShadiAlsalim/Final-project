<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\city;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesPermissionsSeeder::class
        ]);

        $this->call([
            CitySeeder::class
        ]);

        $this->call([
            JobLevelSeeder::class
        ]);

        $this->call([
            JobTitleSeeder::class
        ]);

        $this->call([
            JobTimeTypeSeeder::class
        ]);

        $this->call([
            EducationLevelSeeder::class
        ]);

        $this->call([
            JobIndustrySeeder::class
        ]);

        $this->call([
            InterestsSeeder::class
        ]);

        $this->call([
            LanguageSeeder::class
        ]);

        $this->call([
            LanguageLevelSeeder::class
        ]);

        $this->call([
            JobOppTestSeeder::class
        ]);
    }
}
