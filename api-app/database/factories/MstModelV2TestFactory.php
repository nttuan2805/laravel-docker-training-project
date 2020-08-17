<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MstModelV2Test;
use Faker\Generator as Faker;



$factory->define(MstModelV2Test::class, function (Faker $faker) {

    $kana = array ('ア', 'イ', 'ウ', 'エ', 'オ',
                    'カ', 'キ', 'ク', 'ケ', 'コ',
                    'サ', 'シ', 'ス', 'セ', 'ソ',
                    'タ', 'チ', 'ツ', 'テ', 'ト',
                    'ナ', 'ニ', 'ヌ', 'ネ', 'ノ',
                    'ハ', 'ヒ', 'フ', 'ヘ', 'ホ',
                    'マ', 'ミ', 'ム', 'メ', 'モ',
                    'ヤ', 'ジ', 'ズ', 'ゼ', 'ゾ',
                    'ラ', 'リ', 'ル', 'レ', 'ロ',
                    'ワ', 'ヲ');
    return [
        'model_name'            => $faker->regexify('[a-zA-Z]{5,10}'),
        'model_displacement'    => $faker->randomDigit,
        'model_count'           => $faker->randomDigit,
        'model_hyouji'          => $faker->name,
        'model_kakaku_min'      => $faker->numberBetween($min = 10000, $max = 20000),
        'model_kakaku_max'      => $faker->numberBetween($min = 20001, $max = 40000),
        'model_name_prefix'     => $faker->regexify('[A-Z]{1}'),
        'model_kana_prefix'     => $faker->randomElement($kana)
    ];
});
