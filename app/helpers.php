<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('_errorSystem')) {
    /**
     * @return JsonResponse
     */
    function _errorSystem(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => __('messages.system_error'),
            'data' => null
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

