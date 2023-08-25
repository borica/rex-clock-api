<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $response = $this->authService->login($request->input('email'), $request->input('password'));

        return response()->json(["data" => $response], Response::HTTP_OK);
    }
}