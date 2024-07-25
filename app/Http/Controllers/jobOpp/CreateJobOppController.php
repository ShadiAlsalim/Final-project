<?php

namespace App\Http\Controllers\jobOpp;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\CreateJobOppService;
use Illuminate\Http\Request;
use Throwable;


class CreateJobOppController extends Controller
{
    private CreateJobOppService $create;
    public function __construct(CreateJobOppService $create)
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