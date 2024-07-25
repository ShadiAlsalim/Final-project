<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\job_opp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobOppTestSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    User::create([
      'id' => 2,
    ]);

    User::create([
      'id' => 3,
    ]);

    company::create([
      'name' => 'Google',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Rahaf',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Raghad',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Hiba',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Shadi',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'MTN',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Syriatel',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Al Adib',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Rony',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Microsoft',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 1,
    ]);

    company::create([
      'name' => 'Meta',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 2,
    ]);

    company::create([
      'name' => 'Space X',
      'job_idustry_id' => '2',
      'email'=>'asda@dsd.sds',
      'address' => 'hama',
      'description' => 'dasdasdasda sdsads asdadsa',
      'website' => 'sdasd.dsd.sds',
      'mobile_number' => '0987654321',
      'approved' => 1,
      'logo' => 'dasdasd',
      'banner' => 'dasdasd',
      'user_id' => 3,
    ]);

    job_opp::create([
      'job_type_id' => '1',
      'education_level_id' => '2',
      'job_idustry_id' => '1',
      'job_title_id' => '5',
      'job_level_id' => '3',
      'city_id' => '1',
      'company_id' => '1',
      'portfolio_check' => 1,
      'job_type' => 'onsite',
      'gender' => 'male',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 20,
      'name' => 'Full-Stack Developer (Laravel & Vue.JS)',
      'job_requirements' => 'sdsd asdka sdal sdkja sldkasd asd',
      'job_description' => 'sdsd asdka sdal sdkja sldkasd asd',
      'address' => 'hama',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '100-200',
    ]);

    job_opp::create([
      'job_type_id' => '1',
      'education_level_id' => '2',
      'job_idustry_id' => '1',
      'job_title_id' => '2',
      'job_level_id' => '3',
      'city_id' => '1',
      'company_id' => '1',
      'portfolio_check' => 1,
      'job_type' => 'onsite',
      'gender' => 'male',
      'years_of_experiences' => 5,
      'number_of_vacancies' => 15,
      'name' => 'Senior Software Engineer',
      'job_requirements' => 'Proficient in Java and Python.',
      'job_description' => 'Lead software engineering projects.',
      'address' => 'New York',
      'min_age' => 25,
      'max_age' => 35,
      'salary' => '300-400',
    ]);

    // Remote job opportunity
    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '1',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 7,
      'number_of_vacancies' => 10,
      'name' => 'Remote Customer Support Specialist',
      'job_requirements' => 'Excellent communication skills.',
      'job_description' => 'Provide support to customers via phone and email.',
      'address' => 'Anywhere',
      'min_age' => 18,
      'max_age' => 28,
      'salary' => '150-250',
    ]);

    // Additional onsite job opportunity
    job_opp::create([
      'job_type_id' => '1',
      'education_level_id' => '3',
      'job_idustry_id' => '1',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '3',
      'company_id' => '3',
      'portfolio_check' => 1,
      'job_type' => 'onsite',
      'gender' => 'male',
      'years_of_experiences' => 4,
      'number_of_vacancies' => 10,
      'name' => 'Junior Web Developer',
      'job_requirements' => 'Knowledge of HTML, CSS, and JavaScript.',
      'job_description' => 'Assist in developing and maintaining websites.',
      'address' => 'Los Angeles',
      'min_age' => 21,
      'max_age' => 25,
      'salary' => '80-120',
    ]);

    // Additional remote job opportunity
    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '2',
      'job_idustry_id' => '2',
      'job_title_id' => '2',
      'job_level_id' => '3',
      'city_id' => '1',
      'company_id' => '1',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 8,
      'number_of_vacancies' => 5,
      'name' => 'Digital Marketing Specialist',
      'job_requirements' => 'Experience with SEO and social media marketing.',
      'job_description' => 'Develop and implement digital marketing strategies.',
      'address' => 'Virtual',
      'min_age' => 23,
      'max_age' => 32,
      'salary' => '120-180',
    ]);
    // More onsite job opportunity
    job_opp::create([
      'job_type_id' => '1',
      'education_level_id' => '1',
      'job_idustry_id' => '3',
      'job_title_id' => '1',
      'job_level_id' => '1',
      'city_id' => '1',
      'company_id' => '1',
      'portfolio_check' => 1,
      'job_type' => 'onsite',
      'gender' => 'male',
      'years_of_experiences' => 3,
      'number_of_vacancies' => 5,
      'name' => 'Data Analyst',
      'job_requirements' => 'Strong analytical skills and knowledge of SQL.',
      'job_description' => 'Analyze and interpret complex datasets to help business decision-making.',
      'address' => 'San Francisco',
      'min_age' => 24,
      'max_age' => 35,
      'salary' => '90-130',
    ]);

    // Another remote job opportunity
    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    job_opp::create([
      'job_type_id' => '2',
      'education_level_id' => '3',
      'job_idustry_id' => '2',
      'job_title_id' => '3',
      'job_level_id' => '2',
      'city_id' => '2',
      'company_id' => '2',
      'portfolio_check' => 0,
      'job_type' => 'remote',
      'gender' => 'female',
      'years_of_experiences' => 6,
      'number_of_vacancies' => 12,
      'name' => 'Content Writer',
      'job_requirements' => 'Excellent writing skills and creativity.',
      'job_description' => 'Create engaging content for our blog and social media platforms.',
      'address' => 'Anywhere',
      'min_age' => 22,
      'max_age' => 30,
      'salary' => '70-110',
    ]);

    // job_opp::create([
    //   'name' => 'IT Help Desk Specialist',
    //   'job_title_id' => '2',
    //   'job_type' => 'onesite',
    //   'job_level_id' => '1',
    //   'city_id' => '2',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'male',
    // ]);

    // job_opp::create([
    //   'name' => 'Artificial Intelligence R&D Specialist',
    //   'job_title_id' => '5',
    //   'job_type' => 'onesite',
    //   'job_level_id' => '2',
    //   'city_id' => '1',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'female',
    // ]);


    // job_opp::create([
    //   'name' => 'Back End Developer',
    //   'job_title_id' => '5',
    //   'job_type' => 'onesite',
    //   'job_level_id' => '3',
    //   'city_id' => '2',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'male',
    // ]);

    // job_opp::create([
    //   'name' => 'Human Resources Generalis',
    //   'job_title_id' => '1',
    //   'job_type' => 'remote',
    //   'job_level_id' => '2',
    //   'city_id' => '3',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'male',
    // ]);

    // job_opp::create([
    //   'name' => 'Manager: Internet Service Provider',
    //   'job_title_id' => '1',
    //   'job_type' => 'remote',
    //   'job_level_id' => '3',
    //   'city_id' => '4',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'female',
    // ]);

    // job_opp::create([
    //   'name' => 'Sales coordinator',
    //   'job_title_id' => '7',
    //   'job_type' => 'remote',
    //   'job_level_id' => '2',
    //   'city_id' => '4',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'male',
    // ]);


    // job_opp::create([
    //   'name' => 'Project Operation Officer',
    //   'job_title_id' => '8',
    //   'job_type' => 'remote',
    //   'job_level_id' => '2',
    //   'city_id' => '5',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'female',
    // ]);


    // job_opp::create([
    //   'name' => 'IT Help Desk',
    //   'job_title_id' => '2',
    //   'job_type' => 'remote',
    //   'job_level_id' => '1',
    //   'city_id' => '5',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'male',
    // ]);


    // job_opp::create([
    //   'name' => 'Human Resources Manager',
    //   'job_title_id' => '1',
    //   'job_type' => 'remote',
    //   'job_level_id' => '2',
    //   'city_id' => '5',
    //   'company_id' => '1',
    //   'job_type' => '1',
    //   'gender' => 'female',
    // ]);
  }
}
