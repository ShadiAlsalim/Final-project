<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_oppertunity;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facades\DB; 

class ReturnDataService
{
    public function ReturnAppliedOpp (){

        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 

        $employee_job_opps = DB::table('employee_job_opps')
        ->where('employee_id','=',$employee->id)
        ->leftJoin('job_oppertunities', 'job_oppertunities.id', '=','employee_job_opps.job_oppertunity_id')
        ->get(['employee_id','job_oppertunity_id','status','opp_name','employee_job_opps.id']); 
        return [ 'massage'=>'applied Job opportunities ', 'data'=>$employee_job_opps];
    }

    public function ReturnSavedOpps (){
        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $save_job_oppertunities = DB::table('save_job_oppertunities')
        ->where('employee_id','=',$employee->id)
        ->leftJoin('job_oppertunities', 'job_oppertunities.id', '=','save_job_oppertunities.job_oppertunity_id')
        ->get(['employee_id','job_oppertunity_id','opp_name','save_job_oppertunities.id']); 
        // ->get();
        return [ 'massage'=>'saved Job opportunities ', 'data'=>$save_job_oppertunities];
    }
    
}