<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Schedule::class, function (Faker $faker) {
    return [
        'owner' => $faker->numberBetween($min = 1, $max = 20),
        'title' => $faker->text($maxNbChars = 25),
        'description' => $faker->text,
        'date_start' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
        'date_end' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month', $timezone = null)
    ];
});
