<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // dd("came");
            if (!Auth::user()->is_active) {
                Session::flush();
                Auth::logout();
                return back()->with('error', 'You account has been temporarily blocked. Please contact Admin for more informations');
            }
            return $next($request);
        } else {
            return redirect('/login')->with('error', 'You must be logged in first.');
        }
    }
}
