<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CompanyController extends Controller
{
    private const COMPANY_VALIDATION_RULES = [
        'name' => 'required|string|max:255',
    ];

    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            ['status' => 'success','data' => $this->companyService->getAll()],
            Response::HTTP_OK
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate(self::COMPANY_VALIDATION_RULES);

        return response()->json(
            ['status' => 'success', 'data' => $this->companyService->create($data)],
            Response::HTTP_CREATED
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getById($id): JsonResponse
    {
        return response()->json(
            ['status' => 'success', 'data' => $this->companyService->getById($id)],
            Response::HTTP_OK
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->validate(self::COMPANY_VALIDATION_RULES);

        return response()->json(
            ['status' => 'success', 'data' => $this->companyService->update($id, $data)],
            Response::HTTP_OK
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->companyService->delete($id);

        return response()->json(['status' => 'success'], Response::HTTP_OK);
    }
}
