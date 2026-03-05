<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function success(array $data = [], string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'status'  => true,
            'data'    => $data,
            'message' => $message,
        ], $status);
    }

    protected function created(array $data = [], string $message = ''): JsonResponse
    {
        return $this->success($data, $message, 201);
    }

    protected function error(string $message = '', array $data = [], int $status = 400): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'data'    => $data,
            'message' => $message,
        ], $status);
    }

    protected function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return $this->error($message, [], 404);
    }

    protected function serverError(string $message = 'Something went wrong'): JsonResponse
    {
        return $this->error($message, [], 500);
    }

    protected function validationError(string $message): JsonResponse
    {
        return $this->error($message, [], 422);
    }
}
