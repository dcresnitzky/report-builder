<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Website::class, function (Faker $faker) {
    return [
        'domain' => $faker->tld
    ];
});
