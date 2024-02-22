<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\JsonResponse;

class VerifyCsrfToken
{
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if (!$this->isValid($request->header('X-XSRF-TOKEN'))) {
            throw new HttpException(ResponseAlias::HTTP_UNPROCESSABLE_ENTITY, __('Invalid XSRF token'));
        }

        return $next($request);
    }

    private function isValid(string $csrfToken): bool
    {
        if (config('token.csrf') === $csrfToken) {
            return true;
        }

        return false;
    }
}
