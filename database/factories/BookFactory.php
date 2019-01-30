<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'isbn' => $faker->randomNumber(8),
        'title' => $faker->text(50),
        'cover' => $faker->imageUrl(),
        'price' => $faker->randomFloat(2, 1, 100000),
        'level_id' => factory(App\Models\Level::class)->create(),
    ];
});
