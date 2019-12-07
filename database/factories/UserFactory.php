<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $name = strtolower($faker->unique()->firstName),
        'email' => $name.'@test.com',
        'email_verified_at' => now(),
        'password' => 'password',
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'admin', [
    'name' => 'gordana',
    'email' => 'g@admin.com',
]);

$factory->state(User::class, 'author_1', [
    'name' => 'darko',
    'email' => 'd@author.com',
]);

$factory->state(User::class, 'author_2', [
    'name' => 'boka',
    'email' => 'b@author.com',
]);

