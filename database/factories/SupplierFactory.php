<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'site' => $faker->url,
        'email' => $faker->unique()->email,
        'uf' => $faker->stateAbbr
    ];
});
