<?php

namespace App\Domain\Auth\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class UnauthenticatedException extends Exception
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => 'Unauthenticated',
            'data' => null,
        ], 401);
    }
}
