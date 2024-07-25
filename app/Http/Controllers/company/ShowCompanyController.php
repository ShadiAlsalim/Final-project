<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\company\ShowCompanyService;
use Illuminate\Http\Request;
use Throwable;


class ShowCompanyController extends Controller
{
    private ShowCompanyService $show;
    public function __construct(ShowCompanyService $show)
    {
        $this->show = $show;
    }

    public function show(Request $request, $id)
    {
        try {
            $data = $this->show->show($request, $id);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
    public function show_all(Request $request)
    {
        try {
            $data = $this->show->Show_All($request);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occured', $error->getMessage());
        }
    }

    public function showToken(Request $request)
    {
        try {
            $data = $this->show->showFromToken($request);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occured', $error->getMessage());
        }
    }

    public function showJobsFromToken(Request $request)
    {
        try {
            $data = $this->show->showJobsFromToken($request);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occured', $error->getMessage());
        }
    }
}