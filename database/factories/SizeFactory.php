<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    return [
        //'products_item_id' => factory(\App\Product::class), //this creates a new fake product and take that item_id and put it here.
        'products_item_id' => $faker->numberBetween($min = 1, $max = 70),

        'size_code' => $faker->randomElement($array = array ('Regular','Party','Small', 'Large', 'Square', 'Feast', 'Medium', 'XLarge', 'SmallCuts', 'FourSq', 'Nibble', 'Calzone')),
        //this will be replaced too in the SizeTableSeeder.php
        
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 20),
        'default_size' => 0, //this will be replaced too in the SizeTableSeeder.php
    ];
});
