<?php

namespace App\Domain\User\Actions;

use App\Infrastructure\Support\BaseAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class GetInfoAction extends BaseAction
{
    /**
     * @return JsonResponse
     */
    public function handle(): JsonResponse
    {
        return $this->sendResponse(
            data: [
                'user' => Auth::user(),
                'tenant' => tenant(),
            ],
            message: __('messages.get_info_success')
        );
    }
}
