<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    
    return [
        'item_name' => 'Item '.$faker->foodname(), 
        //if you want Pizza, Drink, Sides instead of 'Item', manipulate ProductTableSeeder.php
        'item_desc' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'categories_category_id' => "", //this value will be given in ProductTableSeeder.php
    ];
});
