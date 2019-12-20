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

        //'name' => $faker->name, 
        //this sometimes gives out salutations like Prof., Dr., etc. which I dont need

        'name' => $faker->firstName." ". $faker->lastName, //only need first last names

        'street_address' => $faker->buildingNumber." ". $faker->streetName,
        'suburb' => $faker->city,
        'state' => $faker->randomElement($array = array('SA', 'VIC', 'NSW')),
        'postcode' => $faker->numberBetween($min = 4000, $max = 6999),
        'phone' => $faker->numberBetween($min = 80000000, $max = 89999999),
        'email_verified_at' => now(),

        'password' => '$2y$10$4eWY07AVB/Br9TSgCgYUI.0r3pSKtnzUNrsAckNX/l11UOlGeiZqS', 
        //Leave this: hashed equivalent of string 'password'. 
        //Laravel automatically unhashes the hashed password... 
        //...and needs a hashed password in the database, or else login wont work.

        'remember_token' => Str::random(10),

    ];
});
