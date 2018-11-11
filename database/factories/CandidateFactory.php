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

$factory->define(App\Models\Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'skype' => 'live:'.$faker->word,
        'city' => $faker->city,
        'state' => $faker->state,
        'linkedin' => $faker->url,
        'portfolio' => $faker->url,
        'availability' => 'De 6 a 8 horas por dia / 6 to 8 hours per day',
        'best_time' => 'Comercial (de 08:00 as 18:00) / Business (from 08:00 a.m. to 06:00 p.m.)',
        'salary' => rand(15,100),
        'crud' => $faker->url,
    ];
});
