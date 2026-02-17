<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1980, 2024),
                'genre' => $faker->randomElement([
                    'Drama',
                    'Comedia',
                    'Acción',
                    'Terror',
                    'Ciencia Ficción'
                ]),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(80, 200),
                'img_url' => $faker->imageUrl(300, 450, 'movie'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
