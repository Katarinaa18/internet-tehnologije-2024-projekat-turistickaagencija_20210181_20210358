<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'agent') {
            return $next($request);
        }
        return response()->json(['message' => 'Access Denied. Only agents are allowed.'], 403);
    }
}
