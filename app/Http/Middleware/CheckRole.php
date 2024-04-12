<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        // Define a default value for $userRole
        $userRole = null;
        
        // Check if the user is authenticated and has a role assigned
        if ($request->user()) {
            // $userRole = $request->user()->role->name;
            $userRole = $request->user()->role->nama;

            // Check if the user has the required role
            if ($userRole == $role) {
                // User has the required role, allow the request
                return $next($request);
            }
        }
        
        // User does not have the required role or is not authenticated, return error response
        return response()->json(['error' => 'check', 'role' => $role, 'user' => $userRole], 403);
    }
}
