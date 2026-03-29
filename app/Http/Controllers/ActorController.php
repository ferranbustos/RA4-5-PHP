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
    /**
 * Delete an actor by ID (API)
 */
public function destroy($id)
{
    try {
        $actor = Actor::find($id);
        
        if (!$actor) {
            return response()->json([
                'action' => 'delete',
                'status' => false,
                'message' => 'Actor not found'
            ], 404);
        }
        
        $actor->delete();
        
        return response()->json([
            'action' => 'delete',
            'status' => true,
            'message' => 'Actor deleted successfully'
        ], 200);
        
    } catch (\Exception $e) {
        return response()->json([
            'action' => 'delete',
            'status' => false,
            'message' => 'Error deleting actor: ' . $e->getMessage()
        ], 500);
    }
}
}