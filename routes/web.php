<?php

use App\Http\Controllers\FilmController;
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

        Route::get('oldFilms/{year?}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}', [FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}', [FilmController::class, "listFilms"])->name('listFilms');

        
    });
});
Route::get('/filmin/film', function () {
    return redirect('/');
});

