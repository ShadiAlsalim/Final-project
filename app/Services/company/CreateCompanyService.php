<?php
namespace App\Services\company;

use App\Models\JobIndustry;
use Storage;
use App\Models\company;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class CreateCompanyService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;

        $company = Company::where('user_id', $user->id)->first();
        try {

            $company['name'] = $request['name'];
            $company['mobile_number'] = $request['mobile_number'];
            $company['website'] = $request['website'];
            $company['description'] = $request['description'];
            $company['address'] = $request['address'];
            $company['email'] = $request['email'];

            $industry = JobIndustry::where('name', $request['job_industry'])->first();
            if (!$industry) {
                return [
                    'message' => 'industry not found',
                    'data' => []
                ];
            }
            $company['job_idustry_id'] = $industry['id'];

            $company['approved'] = false;

            $logo = $request->file('logo');
            $banner = $request->file('banner');
            $logo_path = "";
            $banner_path = "";
            if ($logo) {
                $company['logo'] = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();
                $logo_path = Storage::disk('logo')->put($logo_name, $logo); // Save in public/logo disk
                $company['logo'] = $logo_path;
            }
            if ($banner) {
                $company['banner'] = $request->file('banner');
                $banner_name = time() . '.' . $banner->getClientOriginalExtension();
                $banner_path = Storage::disk('banner')->put($banner_name, $banner); // Save in public/banner disk
                $company['banner'] = $banner_path;
            }

            $company->save();

            $copy = $company;
            $copy['job_idustry_id'] = $industry['name'];
            return [
                'message' => 'created',
                'data' => $copy
            ];
        } catch (Throwable $error) {
            return [
                'message' => $error->getMessage(),
                'data' => [],
            ];
        }
    }
}