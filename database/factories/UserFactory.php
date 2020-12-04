<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName(),
        'fname' => $faker->firstName(),
        'lname' => $faker->lastName(),
        'email' => $faker->email(),
        'password' => Hash::make('admin'), // password
        'api_token' => Str::random(32)
    ];
});
