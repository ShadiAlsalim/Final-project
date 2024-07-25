<?php
namespace App\Http\Controllers\jobOpp;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseService;
use App\Services\jobOpp\DeleteJobOppService;
use Illuminate\Http\Request;
use Throwable;

class DeleteJobOppController extends Controller
{
    private DeleteJobOppService $delete;
    public function __construct(DeleteJobOppService $delete)
    {
        $this->delete = $delete;
    }

    public function delete(Request $request, $id)
    {
        try {
            $data = $this->delete->delete($request, $id);
            return ResponseService::success($data['message'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}