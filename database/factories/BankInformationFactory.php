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

$factory->define(App\Models\BankInformation::class, function (Faker $faker) {

    $faker = \Faker\Factory::create('pt_br');
    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    return [
        'bank_information' => $faker->company,
        'owner' => $faker->name,
        'cpf' => $faker->cpf,
        'bank' => $faker->company,
        'agency' => rand(1000,9999),
        'account' => rand(1000000, 9999999),
        'account_type' => 'Corrente / Chain',
    ];
});
