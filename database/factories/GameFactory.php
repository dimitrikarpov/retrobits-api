<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'platform_id' => function () {
            return App\Platform::all()->random()->id;
        },
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'rom' => null,
        'image' => $faker->imageUrl(640, 480),
    ];
});
