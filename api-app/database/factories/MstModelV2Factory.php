<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MstModelV2;
use Faker\Generator as Faker;

$factory->define(MstModelV2::class, function (Faker $faker) {
    return [
        'model_hyouji' => $faker->name, 
        'model_displacement' => $faker->randomDigit,
        'model_name_prefix' => $faker->name,
        'model_kana_prefix' => $faker->name
    ];
});
