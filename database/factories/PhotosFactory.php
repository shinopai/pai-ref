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
        'title' => substr($faker->unique()->name(), 0, mt_rand(5, 30)),
        'image_path' => $arr[rand(0, 7)],
        'caption' => $faker->sentence,
        'user_id' => mt_rand(1, 201),
        'category_id' => mt_rand(1, 13),
        'location_id' => mt_rand(1, 47)
    ];
});
