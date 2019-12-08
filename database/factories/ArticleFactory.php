<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Article;
use App\Category;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence, '.'),
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => User::whereHas('roles', function($query) {
            return $query->where('name', 'author');
        })->inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'created_at'=> $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
        'is_approved' => $is_approved = rand(0, 1),
        'publish_at'=> $is_approved == 1 ? Carbon::parse($created_at)->addMonths(random_int(1,3)) : null,
    ];
});
