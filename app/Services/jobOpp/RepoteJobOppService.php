<?php
namespace App\Services\jobOpp;


use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_oppertunity;
use App\Models\report_job_oppertunity;
use Illuminate\Support\Facades\Auth;


class RepoteJobOppService
{
    public function RepoteJobOpp ($request , $id){

    $user = Auth::user();
    $employee = employee::where('user_id',$user->id)->first(); 
    $job_oppertunity=job_oppertunity::findOrFail($id);

        $report_job_oppertunity=report_job_oppertunity::where('employee_id',$employee->id)
        ->where('job_oppertunity_id',$job_oppertunity->id)
        ->first();

        if(!$report_job_oppertunity){
            $report=report_job_oppertunity::create([
                'employee_id'=>$employee->id,
                'job_oppertunity_id' => $job_oppertunity->id,
                'reason' => $request['reason']
            ]);
        unset( $report->updated_at , $report->created_at ); 
        return [ 'massage'=>'report sent', 'data'=>$report];

        }
        return [ 'massage'=>'reported before', 'data'=>[]];

    }

    
}