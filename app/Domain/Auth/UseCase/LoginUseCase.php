<?php

namespace App\Domain\Auth\UseCase;

use App\App\Api\Requests\Auth\LoginRequest;
use App\Domain\Auth\Actions\LoginAction;
use Illuminate\Http\JsonResponse;

class LoginUseCase
{
    public function __construct(
        private readonly LoginAction $loginAction
    )
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse|null
     */
    public function handle(LoginRequest $request): ?JsonResponse
    {
        return $this->loginAction->handle($request);
    }
}
