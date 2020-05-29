<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductDetail;
use Faker\Generator as Faker;

$factory->define(ProductDetail::class, function (Faker $faker) {
    return [
        'stock' => random_int(0,1000),
        'size' => random_int(0,100),
        'type' => random_int(0,5)
    ];
});
