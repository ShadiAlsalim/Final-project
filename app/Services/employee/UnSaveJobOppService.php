<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\job_oppertunity;
use App\Models\JobTitle;
use App\Models\Save_job_oppertunity;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class UnSaveJobOppService
{
    public function UnSaveJobOpp ($id){

        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $job_oppertunity=job_oppertunity::findOrFail($id);

        $unSave_job_oppertunity=Save_job_oppertunity::where('employee_id',$employee->id)
        ->where('job_oppertunity_id',$job_oppertunity->id)
        ->first();

        if($unSave_job_oppertunity){
            Save_job_oppertunity::destroy($unSave_job_oppertunity->id); 
        }
        return [ 'massage'=>'unsaved success', 'data'=>[]];}

    
}