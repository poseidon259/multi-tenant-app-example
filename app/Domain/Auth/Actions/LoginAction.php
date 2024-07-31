<?php

namespace App\Domain\Auth\Actions;

use App\App\Api\Requests\Auth\LoginRequest;
use App\Infrastructure\Support\BaseAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginAction extends BaseAction
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function handle(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('web')->attempt($credentials)) {
            return $this->sendError(
                error: null,
                message: __('messages.email_or_password_incorrect'),
            );
        }

        $user = Auth::guard('web')->user();
        $token = $user->createToken('authToken')->accessToken;

        return $this->sendResponse(
            data: [
                'user' => $user,
                'token' => $token
            ],
            message: __('messages.login.success')
        );
    }
}
