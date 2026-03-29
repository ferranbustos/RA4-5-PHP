<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * List all actors
     */
    public function listActors()
    {
        $title = "Listado de todos los actores";
        $actors = Actor::all();
        
        return view('actors.list', [
            'actors' => $actors, 
            'title' => $title
        ]);
    }
}