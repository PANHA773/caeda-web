<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track admin routes if logged in, or just track everyone for simplicity
        // We'll track everyone but excluding common bot strings or just keep it simple for now.

        $ip = $request->ip();
        $today = Carbon::today();

        // Use updateOrCreate with hits increment
        $visitor = Visitor::firstOrCreate(
            ['ip_address' => $ip, 'date' => $today],
            ['hits' => 0]
        );

        $visitor->increment('hits');

        return $next($request);
    }
}
