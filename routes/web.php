<?php
use App\Http\Controllers\Movies\MoviesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ MoviesController::class, 'index' ])->name('index');

Route::name('get-movies')->post('/movies/{search}', [ MoviesController::class, 'getMovies' ]);
