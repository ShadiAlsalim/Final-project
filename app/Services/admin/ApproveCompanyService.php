<?php
namespace App\Services\admin;

use App\Models\company;
use App\Models\JobIndustry;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class ApproveCompanyService
{
    public function Approve($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if (!$user->hasRole('admin')) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        } else {
            $company = company::find($id);
            $industry = JobIndustry::find($company['job_idustry_id']);
            $company['job_idustry_id'] = $industry['name'];
            if (!$company) {
                return [
                    'message' => 'company not found',
                    'data' => []
                ];
            } else if ($company['approved']) {
                return [
                    'message' => 'company is already approved',
                    'data' => $company
                ];
            } else {
                $company['approved'] = true;
                $company->save();
                return [
                    'message' => 'approved successfully',
                    'data' => $company
                ];
            }
        }
    }
}