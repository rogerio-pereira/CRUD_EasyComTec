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

$factory->define(App\Models\CandidateSkills::class, function (Faker $faker) {

    return [
        'skill_id' => rand(1,28),
        'rate' => rand(0,5),
    ];
});
