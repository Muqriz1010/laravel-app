<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProducerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
}); 

Route::get('/movies/index', [MovieController::class, 'index']);
Route::post('movies', [MovieController::class, 'store']);
Route::get('/movies/create', [MovieController::class, 'create']);
Route::get('/movies/actors/{id}', [MovieController::class, 'getMovieActors']);
Route::resource('movies', MovieController::class);

Route::get('/actors/create', [ActorController::class, 'create']);
Route::post('actors', [ActorController::class, 'store']);
Route::get('actors', [ActorController::class, 'getActors']);

Route::post('producers', [ProducerController::class, 'store']);
Route::get('producers', [ProducerController::class, 'getProducers']);



