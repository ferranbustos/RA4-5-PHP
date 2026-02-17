<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActorFakerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->date('Y-m-d', '2005-01-01'),
                'country' => $faker->country(),
                'img_url' => $faker->imageUrl(300, 450, 'people'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}