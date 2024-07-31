<?php

namespace App\App\Api\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Domain\User\UseCase\GetInfoUseCase;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(
        private readonly GetInfoUseCase $getInfoUseCase
    )
    {
    }

    public function getInfo()
    {
        try {
            return $this->getInfoUseCase->handle();
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ' ' . __LINE__ . ' ' . $e->getMessage());
            return _errorSystem();
        }
    }
}
