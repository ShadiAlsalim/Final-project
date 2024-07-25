<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\employee_interests;
use App\Models\Interests;
use App\Models\JobIndustry;
use App\Models\JobTitle;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class AddInterestsService
{
    public function AddInterests($request)
    {

        $user = Auth::user();

        $employee = employee::where('user_id', $user->id)->first();

        foreach ($request['interests'] as $interest) {
            $interests = JobIndustry::where('name', $interest)->first();

            // $check = employee_interests::where('interest_id', $interests->id)->first();
            // $check = true;
            // if (!$check) {
                employee_interests::create([
                    'employee_id' => $employee->id,
                    'interest_id' => $interests->id
                ]);
                $name[] = $interests->name;
            // }

        }
        return ['massage' => 'interests added', 'interests' => $name];
    }

}