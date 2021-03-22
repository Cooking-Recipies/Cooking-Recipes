<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ApiException) {
            return $this->renderJsonResponse($exception->getMessage(), $exception->getCode());
        }
        if ($exception instanceof AuthenticationException) {
            return $this->renderJsonResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof ModelNotFoundException || $exception instanceof RouteNotFoundException) {
            return $this->renderJsonResponse("Not found", Response::HTTP_NOT_FOUND);
        }
        if ($exception instanceof ValidationException) {
            return $this->renderJsonResponse($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY, $exception->errors());
        }

        return $this->renderJsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function renderJsonResponse(string $message, int $code, array $data = []): JsonResponse
    {
        return response()->json([
            "message" => $message,
            "data" => $data,
        ], $code);
    }
}
