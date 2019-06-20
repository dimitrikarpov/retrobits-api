<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'platform_id' => function () {
            return App\Platform::inRandomOrder()->first()->id;
        },
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'rom' => null,
        'image' => $faker->imageUrl(640, 480),
    ];
});
