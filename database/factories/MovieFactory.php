<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {

    $values = collect([
        'Horror', 'Comedy', 'Romance', 'Animation', 'Drama', 'Fantasy', 'Sci-fi'
    ]);

    return [
        'title' => $faker->text(50),
        'director' => $faker->name,
        'imageUrl' => $faker->imageUrl(),
        'duration' => $faker->numberBetween(10, 50),
        'releaseDate' => $faker->date(),
        'genre' => $values->random(2),

    ];
});
