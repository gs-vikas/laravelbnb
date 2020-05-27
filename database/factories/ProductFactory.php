<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(),
        'description' => $faker->text(),
        'status' => random_int(0,5),
        'is_deleted' => random_int(0,1),
    ];
});
