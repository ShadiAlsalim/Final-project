<?php
namespace App\Services\employee;

use App\Models\EducationalCertificates;
use App\Models\EducationLevel;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;


class AddSkillsService
{
    public function AddSkills ($request){
        $user = Auth::user();
        $request->all();
        $employee = employee::where('user_id',$user->id)->first();

        $skills = $request->get('skills');
        $employee->skills = $skills === '' ? null : $skills; 
        $employee->save();
    
    return [ 'massage'=>'skills added', 'data'=>$employee->skills];
    }
}