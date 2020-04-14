<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\ProductSku;

$factory->define(ProductSku::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomNumber(4),
        'stock' => $faker->randomNumber(5),
    ];
});
