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

$factory->define(App\Models\Interview::class, function (Faker $faker) {

    return [
        'candidate_id' => rand(1,5),
        'appointment' => $faker->dateTimeBetween('now', '+ 5 days'),
    ];
});
