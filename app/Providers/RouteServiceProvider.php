<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/accueil';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            
            Route::middleware('web')
            ->group(base_path('routes/web.php'));

            // api
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            
                // restaurant
                Route::get('/api/restaurant', ['App\Http\Controllers\ApiControler', 'ListApiRestaurant']);
                Route::get('/api/restaurant/{id}', ['App\Http\Controllers\ApiControler', 'FindOneApiRestaurant']);
                Route::put('/api/restaurant/{id}', ['App\Http\Controllers\ApiControler', 'UpdateApiRestaurant']);
                Route::post('/api/restaurant', ['App\Http\Controllers\ApiControler', 'CreateApiRestaurant']);
                Route::delete('/api/restaurant/{id}', ['App\Http\Controllers\ApiControler', 'DeleteApiRestaurant']);

                // plats
                Route::get('/api/plat', ['App\Http\Controllers\ApiControler', 'ListApiPlat']);
                Route::get('/api/plat/{id}', ['App\Http\Controllers\ApiControler', 'FindOneApiPlat']);
                Route::post('/api/plat', ['App\Http\Controllers\ApiControler', 'CreateApiPlat']);
                Route::put('/api/plat/{id}', ['App\Http\Controllers\ApiControler', 'UpdateApiPlat']);
                Route::delete('/api/plat/{id}', ['App\Http\Controllers\ApiControler', 'DeleteApiPlat']);
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
