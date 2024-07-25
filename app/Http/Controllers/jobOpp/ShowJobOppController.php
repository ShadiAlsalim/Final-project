<?php

namespace App\Http\Controllers\jobOpp;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\ShowJobOppService;
use Illuminate\Http\Request;
use Throwable;


class ShowJobOppController extends Controller
{
    private ShowJobOppService $show;
    public function __construct(ShowJobOppService $show)
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
            $data = $this->show->show_all($request);
            return ResponseService::success(($data['message']), $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('an error occured', $error->getMessage());
        }
    }
}