<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(403, 'Belum login');
        }

        $role = strtolower(trim(auth()->user()->role));

        if (in_array($role, ['admin', 'reviewer'])) {
            return $next($request);
        }

        abort(403, 'Akses khusus reviewer');
    }
}