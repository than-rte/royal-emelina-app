<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Venue;
use Faker\Generator as Faker;

$factory->define(Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->word . " " . $faker->buildingNumber, 
        'description' => $faker->sentence($nbWords = 20, $variableNbWords = true), 
        'min_people' => $faker->numberBetween($min = 100, $max = 120),
        'max_people' => $faker->numberBetween($min = 150, $max = 300),
        'user_id' => 1
    ];
});