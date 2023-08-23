<?php

namespace App\Http\Controllers;

use App\Services\UserTimeRecordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTimeRecordController extends Controller
{
    /**
     * @var UserTimeRecordService
     */
    private UserTimeRecordService $userTimeRecordService;

    /**
     * @param UserTimeRecordService $userTimeRecordService
     */
    public function __construct(UserTimeRecordService $userTimeRecordService)
    {
        $this->userTimeRecordService = $userTimeRecordService;
    }

    /**
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        return response()->json(
            ['status' => 'success','data' => $this->userTimeRecordService->store(Auth::user()->id)],
            Response::HTTP_OK
        );
    }

    /**
     * @return JsonResponse
     */
    public function getTodayTimeRecords(): JsonResponse
    {
        return response()->json(
            ['status' => 'success','data' => $this->userTimeRecordService->getTodayTimeRecords(Auth::user()->id)],
            Response::HTTP_OK
        );
    }
}