<?php
namespace App\Services\employee;

use App\Models\city;
use App\Models\employee;
use App\Models\JobTitle; 
use App\Models\WorkExperiences; 
use Illuminate\Support\Facades\Auth;


class UpdateExperienceService
{
    public function UpdateExperience ($request , $id){
            
        $data=$request->all();
    
        $workexperience = WorkExperiences::find($id);
        $workexperience->update($data);

        if($request['job_title']){
        $jobtitle =JobTitle::where('name',$request['job_title'] )->first();
        $workexperience->job_title_id = $jobtitle->id;
        $workexperience->save();
        $workexperience['job_title']=$jobtitle->name;
        }

        else{
        $jobtitle =JobTitle::where('id',$workexperience->job_title_id)->first();
        $workexperience['job_title']= $jobtitle->name;
            }
    
        unset($workexperience->employee_id ,$workexperience->job_title_id, $workexperience->updated_at , $workexperience->created_at); 
        return [ 'massage'=>'experience updated', 'data'=>$workexperience];
        
    }
}