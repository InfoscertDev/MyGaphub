<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // ADDED: configure named rate limiters before routes are loaded.
        $this->configureRateLimiting();

        parent::boot();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * 'api'          — general API limiter (used by the 'api' middleware group).
     *                  Keys on user ID when authenticated so each mobile user
     *                  has their own independent bucket. Falls back to IP for
     *                  unauthenticated (login/register) requests only.
     *
     * 'auth-actions' — tighter limiter for sensitive unauthenticated endpoints
     *                  (login, register, password reset). Always IP-keyed
     *                  since no user exists yet.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // General API limiter — referenced in Kernel.php as 'throttle:api'
        RateLimiter::for('api', function (Request $request) {
            return $request->user()
                // Authenticated: 300 req/min per user ID — unaffected by shared IPs
                ? Limit::perMinute(300)->by('user:' . $request->user()->id)
                // Guest (login/register hits): 60 req/min per IP
                : Limit::perMinute(60)->by('ip:' . $request->ip());
        });

        // Sensitive auth endpoint limiter — use on login/register/forgot-password routes
        // e.g.  Route::middleware('throttle:auth-actions')->group(...)
        RateLimiter::for('auth-actions', function (Request $request) {
            return Limit::perMinute(10)->by('ip:' . $request->ip());
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiV2Routes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     * Middleware group 'api' now uses the named 'api' limiter above.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "api/v2" routes for the application.
     * Same 'api' middleware group — same named limiter applies.
     */
    protected function mapApiV2Routes()
    {
        Route::prefix('api/v2')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api-v2.php'));
    }
}