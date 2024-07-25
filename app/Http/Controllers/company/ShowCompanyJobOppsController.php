<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\company\ShowCompanyJobOppsService;
use Illuminate\Http\Request;
use Throwable;


class ShowCompanyJobOppsController extends Controller
{
    private ShowCompanyJobOppsService $show;
    public function __construct(ShowCompanyJobOppsService $show)
    {
        $this->show = $show;
    }

    public function show(Request $request, $id)
    {
        try {
            $data = $this->show->Show($request, $id);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}