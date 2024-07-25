<?php
namespace App\Services\employee;

use App\Models\EducationalCertificates;
use App\Models\EducationLevel;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;


class AddCertificatesService
{
    public function AddCertificates ($request){

        $user = Auth::user();
        $request->all();

        $employee = employee::where('user_id',$user->id)->first(); 
        $education_level =EducationLevel::where('name',$request['education_level'] )->first();

        $EducationalCertificates = EducationalCertificates::create([ 
            'employee_id'=>$employee->id,
            'given_date'=>$request['given_date'],
            'source'=>$request['source'],
            'education_level_id'=>$education_level->id,
          ]);

          $EducationalCertificates['education_level']=$education_level->name;
          unset($EducationalCertificates->employee_id ,$EducationalCertificates->education_level_id, $EducationalCertificates->updated_at , $EducationalCertificates->created_at); 
          return [ 'massage'=>'certificates added', 'data'=>$EducationalCertificates];
    }
}