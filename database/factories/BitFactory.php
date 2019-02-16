<?php

use Faker\Generator as Faker;

$factory->define(App\Bit::class, function (Faker $faker) {
    return [
        'game_title' => $faker->sentence(3),
        'game_rom' => null,
        'game_image' => $faker->imageUrl(640, 480),
        'title' => $faker->sentence(5),
        'players' => $faker->numberBetween(1, 2),
        'difficult' => $faker->randomElement(['easy', 'normal', 'hard']),
        'rating' => $faker->numberBetween(1, 5),
        'savefile' => null,
    ];
});
