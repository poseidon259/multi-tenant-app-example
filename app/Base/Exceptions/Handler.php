<?php

namespace App\Base\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    private array $guards = ['api'];
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|RedirectResponse|\Illuminate\Http\Response|Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): \Illuminate\Http\Response|JsonResponse|Response|RedirectResponse
    {
        if ($e instanceof AuthenticationException) {
            $guard = Arr::get($e->guards(), 0);

            if (in_array($guard, $this->guards)) {
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'Unauthenticated.',
                    'data' => null,
                ], Response::HTTP_UNAUTHORIZED);
            }
        }

        return parent::render($request, $e);
    }
}
