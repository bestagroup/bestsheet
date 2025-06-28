<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $guard = null): Response
    {

        if (!Auth::guard($guard)->check()) {
            return redirect()->route('login');
        }

        $user = Auth::guard($guard)->user();

        //$hasAccess = $user->roles()->where('level', 'admin')->exists();

//        if (!$hasAccess) {
//            abort(403, 'شما دسترسی به داشبورد را ندارید.');
//        }

        return $next($request);
    }
}
