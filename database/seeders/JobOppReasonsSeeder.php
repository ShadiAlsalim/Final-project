<?php

namespace Database\Seeders;

use App\Models\job_oppertunity_reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobOppReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        job_oppertunity_reason::create([
            'name'=> 'محتوى احتيالي',
          ]); 
        job_oppertunity_reason::create([
            'name'=>' عدم تناسب الراتب مع المتطلبات',
          ]); 
        job_oppertunity_reason::create([
            'name'=> 'محتوى مسيئ',
          ]); 
        job_oppertunity_reason::create([
            'name'=> 'other',
          ]); 
    
    }
}
