<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MstModelMakerTest;
use Faker\Generator as Faker;

$factory->define(MstModelMakerTest::class, function (Faker $faker) {
    return [
        'model_maker_hyouji' => $faker->name, 
        'model_maker_country' => $faker->country,
        'model_maker_view_no' => $faker->randomDigit 
    ];
});
