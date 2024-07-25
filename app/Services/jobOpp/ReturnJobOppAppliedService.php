<?php
namespace App\Services\jobOpp;


use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_oppertunity;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facades\DB; 


class ReturnJobOppAppliedService
{
    public function ReturnOppApplied ($id){

        // $job_oppertunity_id=1;
        $job_oppertunities = DB::table('employee_job_opps')
        ->where('job_oppertunity_id','=',$id)
        ->leftJoin('employees', 'employees.id', '=','employee_job_opps.employee_id')
        ->get(['employee_id','job_oppertunity_id','employee_job_opps.id']); 
        // ->get();

        return [ 'massage'=>'job_oppertunities', 'data'=>$job_oppertunities];

    }

    
}