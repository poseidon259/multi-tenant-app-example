<?php

namespace App\Domain\Auth\Actions;

use App\App\Api\Requests\Auth\LoginRequest;
use App\Infrastructure\Support\BaseAction;
use Illuminate\Support\Facades\Auth;

class LoginAction extends BaseAction
{
    public function handle(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('api')->attempt($credentials)) {
            return $this->sendError(
                error: null,
                message: __('messages.unauthenticated')
            );
        }

        $user = Auth::guard('api')->user();
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
