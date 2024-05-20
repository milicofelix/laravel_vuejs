<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    $unit = array_rand(array_flip(['cm', 'm', 'km']));
    return [
        'unit' => $unit,
        'description' => $faker->text($maxNbChars = 30)
    ];
});
