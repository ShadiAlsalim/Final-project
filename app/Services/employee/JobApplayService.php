<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_opp;
use App\Models\job_oppertunity;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class JobApplayService
{
    public function JobApplay ($id){

        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $job_oppertunity=job_oppertunity::findOrFail($id);

        $job_application=Employee_jobOpp::where('employee_id',$employee->id)
        ->where('job_oppertunity_id',$job_oppertunity->id)
        ->first();
        
        if($job_application){
            return [ 'massage'=>'applied before', 'data'=>[]];}

        $age = Carbon::parse($employee->date_of_birth)->age;
        $reason = [];
        if($age>0 || $age<100)  //job opp range //need to change
        $reason[]='age';
        if($employee->gender != $job_oppertunity->gender)
        $reason[]='gender';
        if($employee->military_check != $job_oppertunity->military_check)
        $reason[]='military check';
        if($job_oppertunity->portfolio_check=1){
            if($employee->portfolio_link ==null) //is null
            $reason[]='portfolio needed';}

        if(!$reason){
            $apply=Employee_jobOpp::create([ 
                'employee_id'=>$employee->id,
                'job_oppertunity_id' => $job_oppertunity->id,
                'status' => 'under review', 
                  ]);
            
                
            return [ 'massage'=>'applied success', 'data'=>$apply];
    }
            return [ 'massage'=>'can not apply', 'data'=>$reason];

    }
}