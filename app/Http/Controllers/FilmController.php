<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    
  public function listFilms($year = null, $genre = null)
{
    $films_filtered = [];
    
    $title = "Listado de todas las películas";
    $films = FilmController::readFilms();

    foreach ($films as $film) {
        if ($year && $genre) {
            if ($film['year'] == $year && $film['genre'] == $genre)
                $films_filtered[] = $film;
        } elseif ($year) {
            if ($film['year'] == $year)
                $films_filtered[] = $film;
        } elseif ($genre) {
            if ($film['genre'] == $genre)
                $films_filtered[] = $film;
        } else {
            $films_filtered[] = $film;
        }
    }
    
    if ($year && $genre) {
        $title = "Listado de Pelis filtrado por año ($year) y género ($genre)";
    } elseif ($year) {
        $title = "Listado de Pelis filtrado por año ($year)";
    } elseif ($genre) {
        $title = "Listado de Pelis filtrado por género ($genre)";
    }
    
    return view('films.list', ["films" => $films_filtered, "title" => $title]);
}
}
