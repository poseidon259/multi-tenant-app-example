<?php

namespace App\Infrastructure\Support;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseAction
{
    /**
     * @param $data
     * @param string $message
     * @param int $httpCode
     * @return JsonResponse
     */
    public function sendResponse($data, string $message = '', int $httpCode = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $httpCode);
    }

    /**
     * @param $error
     * @param string|null $message
     * @param int $httpCode
     * @return JsonResponse
     */
    public function sendError($error, string $message = null, int $httpCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
            'data' => $error,
        ];

        return response()->json($response, $httpCode);
    }
}
