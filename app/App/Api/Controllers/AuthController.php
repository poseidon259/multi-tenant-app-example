<?php

namespace App\App\Api\Controllers;

use App\App\Api\Requests\Auth\LoginRequest;
use App\Base\Http\Controllers\Controller;
use App\Domain\Auth\UseCase\LoginUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(
        private readonly LoginUseCase $loginUseCase
    )
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            return $this->loginUseCase->handle($request);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ' ' . __LINE__ . ' ' . $e->getMessage());
            return _errorSystem();
        }
    }
}
