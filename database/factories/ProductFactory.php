<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $weight = array_rand(array_flip([10, 1, 2, 5, 20, 50]));
    $unitId = Unit::all()->pluck('id')->toArray();
    $unitId = array_rand(array_flip($unitId));
    return [
        'name' => $faker->company, 
        'description' => $faker->text(), 
        'weight' => $weight,	
        'unit_id' => $unitId
    ];
});
