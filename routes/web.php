<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('url')->group(function() {
    Route::group(['prefix' => 'filmin'], function(){
        Route::post('film', [FilmController::class, 'createFilm'])->name('film');
    });
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}',[FilmController::class, "listFilms"])->name('listFilms');
        Route::get('countFilms', [FilmController::class, "countFilms"])->name('countFilms');
        Route::get('sortFilms/{order?}', [FilmController::class, "sortFilms"])->name('sortFilms');
        Route::get('groupFilms', [FilmController::class, "groupFilmsByGenreAndYear"])->name('groupFilms');
    });
});

Route::get('/filmdetail/film', function () {
    return redirect('/');
});

Route::group(['prefix' => 'actorout'], function(){
    Route::get('actors', [App\Http\Controllers\ActorController::class, 'listActors'])->name('actors');
    Route::get('actors', [ActorController::class, 'listActors'])->name('actors');
Route::get('actorsByDecade/{decade?}', [ActorController::class, 'listActorsByDecade'])->name('actorsByDecade')->middleware('year');
});
