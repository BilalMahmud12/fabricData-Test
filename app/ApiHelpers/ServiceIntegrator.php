<?php

namespace App\ApiHelpers;

use Illuminate\Support\Manager;
use App\ApiHelpers\Drivers\IMDB;

class ServiceIntegrator extends Manager
{

    public function getDefaultDriver(): string
    {
        return 'anonymous';
    }

    /**
     * Create an instance of Imdb driver.
     *
     * @return IMDB
     */
    public function createImdbDriver(): IMDB
    {
        return new IMDB;
    }
}
