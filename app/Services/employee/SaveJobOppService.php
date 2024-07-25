<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\job_oppertunity;
use App\Models\JobTitle;
use App\Models\Save_job_oppertunity;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class SaveJobOppService
{
    public function SaveJobOpp ($id){

        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $job_oppertunity=job_oppertunity::findOrFail($id);

        $Save_job_oppertunity=Save_job_oppertunity::where('employee_id',$employee->id)
        ->where('job_oppertunity_id',$job_oppertunity->id)
        ->first();

        if(!$Save_job_oppertunity){
            $save=Save_job_oppertunity::create([
                'employee_id'=>$employee->id,
                'job_oppertunity_id' => $job_oppertunity->id,
            ]);
        }
        return [ 'massage'=>'saved success', 'data'=>$save];
    
    }

    
}