<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ranking; // Rankingモデルを使用する
use Faker\Generator as Faker;

// Rankingモデルを指定
$factory->define(Ranking::class, function (Faker $faker) {
    return [
        // 生成するダミーデータのカラムと値を設定
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },

        // 0〜10のランダムの値に10をかける
        'percentage_correct_answer' => rand(0, 10) * 10,
    ];
});
