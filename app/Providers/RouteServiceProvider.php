<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    //一般userのダイレクト先
    public const USER = '/user';
    //farmUserのリダイレク先
    public const FARM_HOME = '/farm';
    //adminのリダイレクト先
    public const ADMIN = '/admin';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapFarmUserRoutes();
        $this->mapUserRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * @return void
     */
    protected function mapUserRoutes()
    {
        Route::middleware('users')
             ->prefix(null)
             ->namespace($this->namespace)
             ->group(base_path('routes/user/web.php'));
    }

    protected function mapFarmUserRoutes()
    {
        Route::middleware('farm')
             ->prefix(null)
             ->namespace($this->namespace)
             ->group(base_path('routes/farm/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('admin')
             ->prefix(null)
             ->namespace($this->namespace)
             ->group(base_path('routes/admin/web.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
