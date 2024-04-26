<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class APIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            throw new AuthenticationException('Unauthenticated.');
        }

        return $next($request);
    }
//    public function render($request, \Throwable $exception)
//    {
//        if ($exception instanceof AuthenticationException) {
//            return response()->json(['error' => 'Unauthenticated.'], 401);
//        }
//
//        return parent::render($request, $exception);
//    }
}
