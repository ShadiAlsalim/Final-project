<?php

namespace App\Http\Controllers;
use App\Models\company;
use App\Models\employee;
use App\Models\User;
use App\Models\JobTitle;
use App\Models\WorkExperiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\Role;
use App\Models\testl;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Contracts\Role as ContractsRole;


class TestingControllers extends Controller
{
    public function test(Request $request){
        $request->validate([
            'first_name'=>'required',
            'city_id'=>'required' , 
        ]);

        $user = employee::create([
            'first_name' => $request->first_name,
            'city_id' => $request->city_id,
        ]);
        
        return $user;
    }

    public function employeeInCity(Request $city_Id){
        $user=employee::query()->where('city_id',$city_Id['id'])->get();
         return $user;
    }

     public function verification( $request )
        {  
            $data = ([ 
                'email'=>$request['email'],
                'password'=>$request['password'],
                'role'=>$request['role']
            ]);

            $verificationCode = rand(10000,99999);
            $email = $request['email'] ;
            // notify(new EmailVerification());   
            // Mail::to($request['email'])->send(new EmailVerification()); // Send email

            Mail::raw($verificationCode, function ($data) use ($email) {
            $data->from('mhd654mhd653@gmail.com', 'Your Name');
            $data->to($email)->subject('Your Verification Code');
             });
            // return [ 'massage'=>'check your email ' , 'data'=>$data]
            return $data ;
    }
    
    public function resetPassword (Request $request){

        $validatePassword = Validator::make($request->all(),[
            'password' => 'required| regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            ]);
        
        $user=User::where('email',$request->email)->first();
            if(!$user) 
             return response()->json(['message'=>'wrong email' , 'data' =>[] ] ,400);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

        return response()->json([
        'message'=>'The pssword updated successfully' , 
        'data' =>$user , 
        ] ,201);
        
    }

    public function add(Request $request){
        $validatePassword = Validator::make($request->all(),[
            'first' => 'required',
            'last' => 'required',]);
        $user = User::create([ 
        'first'=>$request['first'],
        'last'=>$request['last']   ]); //employee and company only
        return $user;
    }

    public function hasRole (Request $request){
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if($user->HasRole('employee'))
        return 'employee';
    }

    public function addImage (Request $request){
        $user = Auth::user();

        //get the image
        $file =  $request->file('image'); 
        $exten = $file->getClientOriginalExtension();
        $filename = time().'.'.$exten;
        $filepath = 'photos/employee/';
        $file->move($filepath  , $filename);
        $image_url = asset($filepath . $filename); 

        //save the image
        $emp = employee::where('user_id',$user->id)->first() ;
        $emp->image = $image_url;
        $emp->save();

          return  $image_url;
    }

    public function array(Request $request){

            $request->all();
            return $request;
    }

    public function json(Request $request){
            $skills = $request->input('skills'); // Access the skills array
            $json = testl::create([
              'skills' => $skills, // Pass the array to the 'skills' attribute
            ]);
            return $json;
    }


    // public function update(Request $request){
    //     $request->all();
    //     $user = Auth::user();
    //     $employee = employee::where('user_id',$user->id)->first(); 
    //     if(!$request){
    //     $employee->update([
    //         'first_name'=> $request->first_name,
    //         'last_name' => $request->last_name,
    //         'gender' => $request->gender,
    //     ]);}
    //     return $employee;
    // }


    public function update(Request $request)
    {
        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $validatedData = $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'work_email' => 'nullable|string',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable',
            'portfolio_link' => 'nullable|string',
            'military_check' => 'nullable',
            'city' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'linkdein_link' => 'nullable|string',
            'github_link' => 'nullable|string'.$employee->id,  
        ]);
        $employee->update(array_filter($validatedData, function ($value) {
            return !is_null($value); 
              
        }));
        return response()->json($employee, 200);
    }


    // public function update(Request  $request , int $id){
    //  $request->validate([
    //     'first_name' => 'nullable|string',
    //     'last_name' => 'nullable|string',
    //     'phone_number' => 'nullable',
    //      ]);

    //  $employee=employee::query()->where('id',$id)->update([
    //     'first_name' => $request->first_name,
    //     'last_name' => $request->last_name,
    //     'phone_number' => $request->phone_number,]);

    // $employee=DB::table('employees')->where('id',$id)->update([
    //     'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'phone_number' => $request->phone_number,]);

    //     return response()->json($employee, 200);

    //     }


        // public function update(Request $request , $id){
        //     $employee=employee::find($id);
        //     $employee->update([$request]);
        //     return $employee;
        // }

          public function jsony(){
            $user = Auth::user();
            $model = employee::where('user_id',$user->id)->first();
            // $model->first_name =$id;
            $model->skills = [
            'value1',
            'value2',
            'value3',
            ];
            $model->save();
            return $model;
        }

        public function interests(Request $request){
            $request=['one','tow','three'];

            foreach ($request as $element) {
               
              }
        }
        
        public function search (Request $request){
            $search = $request->input('search');
            $results = employee::where('first_name', 'like', "%$search%")->get();
            return $results;
        }
    }