<?php
namespace App\Services\employee;

use App\Models\city;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;




class CreateProfileService
{
    public function createProfile ($request){

        $user = Auth::user();
        $data=$request->all();
        $employee = employee::where('user_id',$user->id)->first();
        $employee->update($data);

        //////city 
        if($request['city'] ){ 
        $city =city::where('name',$request['city'] )->first();
        $employee->city_id = $city->id;
        $employee->save();
        }else{
        $city =city::where('id',$employee->city_id)->first();
        $data =$city->name;}
        
        // //////////image 
        if($request['image']) {
        $file =  $request->file('image'); 
        $exten = $file->getClientOriginalExtension();
        $filename = time().'.'.$exten;
        $filepath = 'photos/employee/';
        $file->move($filepath  , $filename);
        $image_url = asset($filepath . $filename); 
        $employee->image = $image_url;
        $employee['image']= $image_url;
        $employee->save();
        }

        $profile= DB::table('employees')
        ->where('employees.id',1)
        ->leftJoin('cities', 'cities.id', '=', 'employees.city_id')
        ->get();
    
        unset( $employee->city_id , $employee->user_id , $employee->updated_at , $employee->created_at ); 
        return [ 'massage'=>'profile created', 'data'=>$profile];
        
  

    }
}

