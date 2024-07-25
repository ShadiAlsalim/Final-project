<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\JobTitle;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class AddExperiencesService
{
    public function AddExperience ($request){

        $user = Auth::user();
        $request->all();

        $employee = employee::where('user_id',$user->id)->first(); 
        $jobtitle =JobTitle::where('name',$request['job_title'] )->first();

        $workexperience = WorkExperiences::create([ 
            'employee_id'=>$employee->id,
            'company_name'=>$request['company_name'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'description'=>$request['description'],
            'job_title_id'=>$jobtitle->id,
          ]);
          
        $workexperience['job_title']=$jobtitle->name;
        unset($workexperience->employee_id , $workexperience->id ,$workexperience->job_title_id, $workexperience->updated_at , $workexperience->created_at); 

          return [ 'massage'=>'experience created', 'data'=>$workexperience];
    }
}