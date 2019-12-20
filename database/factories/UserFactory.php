<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'street_address' => $faker->buildingNumber." ". $faker->streetName,
        'suburb' => $faker->city,
        'state' => $faker->randomElement($array = array('SA', 'VIC', 'NSW')),
        'postcode' => $faker->numberBetween($min = 4000, $max = 6999),
        'phone' => $faker->numberBetween($min = 80000000, $max = 89999999),
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),

    ];
});
