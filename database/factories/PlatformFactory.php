<?php

use Faker\Generator as Faker;

$factory->define(App\Platform::class, function (Faker $faker) {
    $name = $faker->word;

    return [
        'title' => $name,
        'slug' => $name
    ];
});
