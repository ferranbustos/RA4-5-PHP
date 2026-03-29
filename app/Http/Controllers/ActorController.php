<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * List all actors
     * Returns view with all actors from database
     */
    public function listActors()
    {
        $title = "Listado de todos los actores";
        // Get all actors using Eloquent
        $actors = Actor::all();
        
        return view('actors.list', [
            'actors' => $actors, 
            'title' => $title
        ]);
    }

    /**
     * List actors born in a specific decade
     */
    public function listActorsByDecade($decade = null)
    {
        if (is_null($decade)) {
            $decade = 2000;
        }

        $startYear = $decade;
        $endYear = $decade + 9;

        $title = "Actores nacidos entre $startYear y $endYear";
        
        $actors = Actor::whereBetween('birthdate', [
            "$startYear-01-01",
            "$endYear-12-31"
        ])->get();

        return view('actors.list', [
            'actors' => $actors,
            'title' => $title
        ]);
    }
}