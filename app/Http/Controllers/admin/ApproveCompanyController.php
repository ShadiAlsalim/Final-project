<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\admin\ApproveCompanyService;
use Illuminate\Http\Request;
use Throwable;


class ApproveCompanyController extends Controller
{
    private ApproveCompanyService $approve;
    public function __construct(ApproveCompanyService $approve)
    {
        $this->approve = $approve;
    }

    public function approve(Request $request, $id)
    {
        try {
            $data = $this->approve->Approve($request, $id);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}