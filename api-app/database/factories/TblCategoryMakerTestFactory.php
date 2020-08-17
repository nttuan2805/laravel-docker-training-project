<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TblCategoryMakerTest;
use Faker\Generator as Faker;

$factory->define(TblCategoryMakerTest::class, function (Faker $faker) {
    return [
        'maker_code' => $faker->randomDigit,
        'category_code' => $faker->randomDigit,
        'category_type' => $faker->randomDigit
    ];
});
