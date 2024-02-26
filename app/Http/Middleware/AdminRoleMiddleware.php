<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!in_array($user->role, [User::ROLE_SUPER_ADMIN, User::ROLE_ADMIN, User::ROLE_COMMERCIAL])) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
