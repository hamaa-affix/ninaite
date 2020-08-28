<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Farm;
use Faker\Generator as Faker;

$factory->define(Farm::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'postal_code' => $faker->postcode,
        'address1' => $faker->prefecture,
        'address2' => $faker->city,
        'address3' => $faker->streetAddress,
        'tel' => $faker->phoneNumber,
        'site_url'=> $faker->url,
        'summary' => $faker->realText($maxNbChars = 20, $indexSize = 2),
    ];
});
