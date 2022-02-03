<?php

use App\ApiHelpers\ServiceIntegrator;

if (!function_exists('ServiceIntegrator')) {
    /**
     * Initialize Integration Driver Manager.
     *
     * @return App\ApiHelpers\ServiceIntegrator
     */
    function ServiceIntegrator(): ServiceIntegrator
    {
        return app(ServiceIntegrator::class);
    }
}
