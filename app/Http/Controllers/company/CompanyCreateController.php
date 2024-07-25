<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\company\CreateCompanyService;
use Illuminate\Http\Request;
use Throwable;


class CompanyCreateController extends Controller
{
    private CreateCompanyService $create;
    public function __construct(CreateCompanyService $create)
    {
        $this->create = $create;
    }

    public function create(Request $request)
    {
        try {
            $data = $this->create->Create($request);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}