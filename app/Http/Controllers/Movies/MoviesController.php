<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MoviePoster;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use PHPUnit\Exception;

class MoviesController extends Controller
{

    public function index(): Response
    {
        $movieList = Movie::with('poster')->orderBy('year', 'desc')->get();
        return Inertia::render('Index', [
            'movieList' => $movieList
        ]);
    }


    public function getMovies(Request $request): RedirectResponse
    {

        $response = ServiceIntegrator()->driver('IMDB')->queryMoviesAPI($request->search);
        $data = json_decode($response->getBody()->getContents(), true);

        // This loop in order to insert the response data has to be separate in repository class
        // in order to keep the controller method clean and focused on handling requests only.

        foreach ($data['Search'] as $item) {
            $movie = Movie::firstOrNew([
                'imdb_id' => $item['imdbID'],
                'title' => $item['Title'],
                'year' => $item['Year'],
                'type' => $item['Type']
            ]);
            $movie->save();

            $movie->poster()->firstOrNew([
                'movie_id' => $movie->id,
                'poster_url' => $item['Poster']
            ])->save();

        }

        return Redirect::back()->with('success', 'Requested Movies Has been fetched Successfully!');
    }

}
