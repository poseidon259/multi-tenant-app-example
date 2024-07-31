<?php

namespace App\Base\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guard = $guards[0] ?? 'api';

        if ($guard && Auth::guard($guard)->check()) {
            return $next($request);
        }

        return $this->unauthenticated($request, $guards);
    }

    /**
     * @param $request
     * @param array $guards
     * @return JsonResponse|void
     */
    protected function unauthenticated($request, array $guards)
    {
        if (!$request->expectsJson()) {
            return response()->json([
                'data' => null,
                'message' => 'Unauthenticated.',
                'success' => false
            ], 401);
        }

        $this->redirectTo($request);
    }


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
