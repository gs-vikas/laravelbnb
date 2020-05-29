<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 10),
        'description' => $faker->text($maxNbChars = 50),
        'status' => random_int(0,1),
        'is_deleted' => random_int(0,1),
    ];
});
