<?php
namespace App\Services\jobOpp;

use App\Models\job_opp;
use App\Models\company;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class DeleteJobOppService
{
    public function delete($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        $job_opp = job_opp::find($id);
        if (!$job_opp) {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
        $company = Company::find($job_opp['company_id']);
        if ($user['role'] == 'employee' || $user['id'] != $company['user_id']) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        } else {
            try {
                job_opp::destroy($id);
                return [
                    'message' => 'deleted',
                    'data' => []
                ];
            } catch (Throwable $e) {
                return [
                    'message' => $e->getMessage(),
                    'data' => []
                ];
            }
        }
    }

}