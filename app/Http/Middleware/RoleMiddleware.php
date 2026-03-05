<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user() || !$request->user()->role) {
            abort(403, 'Accès non autorisé.');
        }

        $userRole = $request->user()->role->name;

        if (!in_array($userRole, $roles)) {
            return redirect()->route('dashboard')->with('error', 'Accès non autorisé.');
        }

        return $next($request);
    }
}
