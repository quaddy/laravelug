<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Manufacturers;
use Faker\Generator as Faker;

$factory->define(Manufacturers::class, function (Faker $faker) {
    return [
        'manufacturer_name' => $faker->company,
    ];
});
