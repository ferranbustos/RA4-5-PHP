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
 public function listFilmsbygenereandbyyear($year = null, $genre = null)
{
    $films_filtered = [];
    
    $title = "Listado de todas las películas";
    $films = FilmController::readFilms();
}

    public function countFilms()
    {
        $films = FilmController::readFilms();
        $total = count($films);

        $title = "Total de películas: $total";
        return view('films.count', ["title" => $title, "total" => $total]);
    }

    public function listFilmsSortedByYear($order = "asc")
    {
        $films = FilmController::readFilms();

        usort($films, function ($a, $b) {
            return $a['year'] <=> $b['year'];
        });

        if ($order == "desc") {
            $films = array_reverse($films);
        }

        $title = "Películas ordenadas por año (" . strtoupper($order) . ")";
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    public function listFilmsByGenreAndByYear()
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

        $title = "Películas por género y por año";
        return view('films.grouped', ["title" => $title, "grouped" => $grouped]);
    }

}

