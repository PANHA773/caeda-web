<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminTokenMiddleware
{
    /**
     * Handle an incoming request.
     * Check for a configured admin token and validate against request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow skipping token check during local/testing development
        if (app()->environment('local', 'testing')) {
            return $next($request);
        }

        // token from env or config
        $token = env('ADMIN_API_TOKEN') ?: config('admin.token');

        if (empty($token)) {
            abort(500, 'Admin token not configured. Set ADMIN_API_TOKEN in .env');
        }

        // Accept token via X-Admin-Token header, Authorization Bearer, or admin_token query param
        $provided = $request->header('X-Admin-Token');

        if (!$provided) {
            $authHeader = $request->header('Authorization', '');
            if (stripos($authHeader, 'Bearer ') === 0) {
                $provided = trim(substr($authHeader, 7));
            }
        }

        if (!$provided) {
            $provided = $request->query('admin_token');
        }

        if (empty($provided) || !hash_equals((string)$token, (string)$provided)) {
            abort(403, 'Invalid admin token');
        }

        return $next($request);
    }
}
