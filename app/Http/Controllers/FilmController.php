<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }else if((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }else if(!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Check if film exists by name
     */
    public function isFilm($filmName)
    {
        $films = FilmController::readFilms();

        if (is_null($films)) {
            return false;
        }

        foreach ($films as $film) {
            if ($film['name'] == $filmName) {
                return true;
            }
        }

        return false;
    }

    /**
     * Create a new film
     */
    public function createFilm(Request $request)
    {
        $name = $request->input('nombre');

        // Si existe -> error
        if ($this->isFilm($name)) {
            return redirect('/')->with('error', 'La película ya existe');
        }

        $films = FilmController::readFilms();
        if (is_null($films)) {
            $films = [];
        }

        $newFilm = [
            "name" => $request->input("nombre"),
            "year" => (int)$request->input("año"),
            "genre" => $request->input("genero"),
            "country" => $request->input("Pais"),
            "duration" => (int)$request->input("duracion"),
            "img_url" => $request->input("imagen")
        ];

        $films[] = $newFilm;

        Storage::put('public/films.json', json_encode($films, JSON_PRETTY_PRINT));

        return $this->listFilms();
    }

    /**
     * Count total films
     */
    public function countFilms()
    {
        $films = FilmController::readFilms();
        $total = count($films);

        $title = "Total de películas";
        return view('films.count', ["title" => $title, "total" => $total]);
    }

    /**
     * Sort films by year
     */
    public function sortFilms($order = "asc")
    {
        $films = FilmController::readFilms();

        usort($films, function($a, $b) {
            return $a['year'] <=> $b['year'];
        });

        if (strtolower($order) == "desc") {
            $films = array_reverse($films);
        }

        $title = "Películas ordenadas por año (" . strtoupper($order) . ")";
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    /**
     * Group films by genre and year
     */
    public function groupFilmsByGenreAndYear()
    {
        $films = FilmController::readFilms();
        $grouped = [];

        foreach ($films as $film) {
            $genero = $film['genre'];
            $anyo = $film['year'];

            if (!isset($grouped[$genero])) $grouped[$genero] = [];
            if (!isset($grouped[$genero][$anyo])) $grouped[$genero][$anyo] = [];

            $grouped[$genero][$anyo][] = $film;
        }

        ksort($grouped);
        foreach ($grouped as $genero => $anyos) {
            ksort($grouped[$genero]);
        }

        $title = "Películas agrupadas por género y año";
        return view('films.grouped', ["title" => $title, "grouped" => $grouped]);
    }
}