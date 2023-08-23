<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends Exception
{
    /**
     * @param $message
     * @param $statusCode
     */
    public function __construct(
        protected $message = 'Api Error',
        protected $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY
    ) {
        parent::__construct($message);
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json(["error: " . $this->message], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}