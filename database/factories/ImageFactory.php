<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'game_id' => App\Game::inRandomOrder()->first()->id,
        'url' => $faker->imageUrl(640, 480),
    ];
});
