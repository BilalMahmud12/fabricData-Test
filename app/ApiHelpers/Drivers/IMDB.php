<?php
namespace App\ApiHelpers\Drivers;

use App\ApiHelpers\Contracts\MoviesContract;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class IMDB implements MoviesContract
{
    protected function getAPIKEY()
    {
        return env('IMDB_KEY');
    }

    protected function getBaseUrl()
    {
        return env('IMDB_BASE_URL');
    }

    /**
     * @param $QUERY
     * @return Response
     */
    public function queryMoviesAPI($QUERY): Response
    {
        $url = $this->getBaseUrl() . '?s=' . $QUERY . '&apiKey=' . $this->getAPIKEY();
        return Http::get($url);
    }
}


