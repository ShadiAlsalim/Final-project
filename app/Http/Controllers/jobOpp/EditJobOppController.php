<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\EditJobOppService;
use Illuminate\Http\Request;
use Throwable;


class EditJobOppController extends Controller
{
    private EditJobOppService $edit;
    public function __construct(EditJobOppService $edit)
    {
        $this->edit = $edit;
    }

    public function edit(Request $request, $id)
    {
        try {
            $data = $this->edit->edit($request->validated(), $id);
            return ResponseService::success($data['massage'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}