<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        // si no hay datos, no hacemos nada
        if (count($filmIds) == 0 || count($actorIds) == 0) {
            return;
        }

        // 10 relaciones (film_id, actor_id)
        for ($i = 0; $i < 10; $i++) {
            $film = $filmIds[array_rand($filmIds)];
            $actor = $actorIds[array_rand($actorIds)];

            // insert ignorando duplicados
            $exists = DB::table('films_actors')
                ->where('film_id', $film)
                ->where('actor_id', $actor)
                ->exists();

            if (!$exists) {
                DB::table('films_actors')->insert([
                    'film_id' => $film,
                    'actor_id' => $actor,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
