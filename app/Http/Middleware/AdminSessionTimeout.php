<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('admin_last_activity');
            $timeout = config('session.admin_timeout', 900); // 15 minutes default

            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                Auth::logout();
                session()->forget(['admin_last_activity']);

                return redirect()->route('admin.login')->with('error', 'Session expired due to inactivity. Please authenticate again.');
            }

            session(['admin_last_activity' => time()]);
        }

        return $next($request);
    }
}
