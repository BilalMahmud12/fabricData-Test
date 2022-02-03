<?php

namespace App\Providers;

use App\ApiHelpers\ServiceIntegrator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceIntegrator::class, function () {
            return new ServiceIntegrator($this->app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        require_once app_path('/ApiHelpers/helpers.php');
    }
}
