<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Routing\Route;

class Authenticate extends Middleware
{
    /**
     * 未ログイン時にログイン認証が必要なページにアクセスした時のリダイレクト先
     */

    protected $user_route = 'user.login';

    protected $farm_user_route = 'farm_user.login';

    protected $admin_route = 'admin_route';
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif(Route::is('user.*')) {
                return route($this->user_route);
            } elseif(Route::is('farm_user.*')) {
                return route($this->farm_user_route);
            }
        }
    }
}
