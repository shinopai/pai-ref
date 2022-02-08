<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use App\User;
use App\Category;
use App\Location;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    $arr = [
        'ayaueto.jpg',
        'kegon.jpg',
        'kyoto.jpg',
        'hanshin.jpg',
        'tyson.jpg',
        'ode.jpg',
        'tokoroson.jpg',
        'tori.jpg'
    ];

    return [
        'title' => substr($faker->unique()->name(), 0, rand(5, 30)),
        'image_path' => $arr[rand(0, 7)],
        'caption' => $faker->sentence,
        'user_id' => rand(2, User::count()),
        'category_id' => rand(1, Category::count()),
        'location_id' => rand(1, Location::count())
    ];
});
