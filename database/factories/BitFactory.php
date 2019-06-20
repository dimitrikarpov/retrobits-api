<?php

use Faker\Generator as Faker;

$factory->define(App\Bit::class, function (Faker $faker) {
    return [
        'game_id' => function () {
            return App\Game::inRandomOrder()->first()->id;
        },
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph(),
        'players' => $faker->numberBetween(1, 2),
        'difficult' => $faker->randomElement(['easy', 'normal', 'hard']),
        'rating' => $faker->numberBetween(1, 5),
        'savefile' => null,
        'user_id' => function() {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});


