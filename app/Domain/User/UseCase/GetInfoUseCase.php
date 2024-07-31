<?php

namespace App\Domain\User\UseCase;

use App\Domain\User\Actions\GetInfoAction;
use Illuminate\Http\JsonResponse;

class GetInfoUseCase
{
    public function __construct(
        private readonly GetInfoAction $getInfoAction
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function handle(): JsonResponse
    {
        return $this->getInfoAction->handle();
    }
}
