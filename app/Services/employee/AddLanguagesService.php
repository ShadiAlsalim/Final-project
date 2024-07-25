<?php
namespace App\Services\employee;

use App\Models\User;
use App\Models\LanguageLevel;
use App\Models\LanguageAndLevel;
use App\Models\Language;
use App\Models\employee;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;


class AddLanguagesService
{
    public function AddLanguages ($request){

        $user = Auth::user();
        $request->all();

        $employee = employee::where('user_id',$user->id)->first(); 
        $Language =Language::where('name',$request['language'] )->first();
        $LanguageLevel =LanguageLevel::where('level',$request['level'] )->first();

        $Language_Level = LanguageAndLevel::create([ 
            'employee_id'=>$employee->id,
            'language_level_id'=>$LanguageLevel->id,
            'language_id'=>$Language->id,
          ]);
          $Language_Level['language']=$Language->name;
          $Language_Level['language_level']=$LanguageLevel->level;
          unset($Language_Level->id, $Language_Level->employee_id , $Language_Level->language_id , $Language_Level->Language_Level ,$Language_Level->language_level_id, $Language_Level->updated_at , $Language_Level->created_at); 

          return [ 'massage'=>'languages added', 'data'=>$Language_Level];
    }
}