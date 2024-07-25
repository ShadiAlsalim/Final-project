<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_oppertunity;
use App\Models\JobTitle;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class CancelApplyService
{
    public function CancelApply ($id){

        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $job_oppertunity=job_oppertunity::findOrFail($id);

        $application=Employee_jobOpp::where('employee_id', $employee->id)
        ->where('job_oppertunity_id',$job_oppertunity->id)
        ->first();

        if($application){
            Employee_jobOpp::destroy($application->id); 
        return [ 'massage'=>'canceled applying success', 'data'=>[]];
        }
        return [ 'massage'=>'you did not apply ', 'data'=>[]];

    }
}