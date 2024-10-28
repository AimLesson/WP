<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Update last_activity
            $user = Auth::user();
            $user->last_activity = now();
            $user->save(); // Save the user model to persist the change
        }
        return $next($request);
    }
}
