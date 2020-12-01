<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\AdminLoginToken;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(AdminLoginToken::class, function (Faker $faker) {
    return [
        'token' => Hash::make('password1234')
    ];
});
