<?php
namespace App\Services\employee;

use App\Models\Certificates;
use App\Models\city;
use App\Models\employee;
use App\Models\EducationalCertificates;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\Auth;


class UpdateCertificatesService
{
    public function updateCertificates ($request , $id){

    $data=$request->all();
    $EducationalCertificates = EducationalCertificates::find($id);
    $EducationalCertificates->update($data);

    if($request['education_level']){
    $education_level =EducationLevel::where('name',$request['education_level'] )->first();

    $EducationalCertificates->education_level_id = $education_level->id;
    $EducationalCertificates->save();
    $EducationalCertificates['education_level']=$education_level->name;
    }

    else{
    $education_level =EducationLevel::where('id',$EducationalCertificates->education_level_id)->first();
    $EducationalCertificates['education_level']= $education_level->name;
        }

    unset($EducationalCertificates->employee_id,$EducationalCertificates->education_level_id, $EducationalCertificates->updated_at , $EducationalCertificates->created_at); 
    return [ 'massage'=>'Certificates updated', 'data'=>$EducationalCertificates];

    }
}