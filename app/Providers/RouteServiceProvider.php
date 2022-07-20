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
                Route::get('/restaurant', ['App\Http\Controllers\ApiControler', 'listApiRestaurant']);
                Route::get('/restaurant/{id}', ['App\Http\Controllers\ApiControler', 'FindOneApiRestaurant']);
                Route::post('/restaurant/new', ['App\Http\Controllers\ApiControler', 'createApiRestaurant']);
                Route::delete('/restaurant/del/{id}', ['App\Http\Controllers\ApiControler', 'deleteApiRestaurant']);

                     // plats
                     Route::get('/restaurant/{id}/plat', ['App\Http\Controllers\ApiControler', 'listApiPlat']);
                    
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
