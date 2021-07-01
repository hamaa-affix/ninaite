<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USERS = 'users';
    private const GUARD_FARM_USERS = 'farm_users';
    private const GUARD_ADMIN = 'admin';


    /**
     * Handle an incoming request.
     *ログイン状態でログイン画面に遷移使用としたらgaurdの機能でredirectさせる
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && $guard === 'users') {
            return redirect(RouteServiceProvider::USER);
        }

        if (Auth::guard($guard)->check() && $guard === 'farm_users') {
            return redirect(RouteServiceProvider::FARM_HOME);
        }

        if (Auth::guard($guard)->check() && $guard === 'ademin') {
            return redirect(RouteServiceProvider::ADMIN);
        }
        
        return $next($request);
    }
}
