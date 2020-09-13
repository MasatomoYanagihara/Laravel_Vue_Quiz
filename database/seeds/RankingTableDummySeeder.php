<?php

use App\Ranking;
use Illuminate\Database\Seeder;

class RankingTableDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rankings')->truncate();
        DB::table('users')->truncate();

        for ($i = 1; $i <= 5; $i++) {

            // factory()の第２引数は生成するデータの件数を指定
            // 今週
            factory(Ranking::class, 10)->create(
                [
                    'percentage_correct_answer' => rand(0, 2) * 10,
                    'created_at' => now()->startOfWeek()->format('Y-m-d')
                ]
            );

            // 今月
            factory(Ranking::class, 10)->create(
                [
                    'percentage_correct_answer' => rand(2, 8) * 10,
                    'created_at' => now()->startOfMonth()->format('Y-m-d')
                ]
            );

            // 今年
            factory(Ranking::class, 10)->create(
                [
                    'created_at' => now()->startOfYear()->format('Y-m-d')
                ]
            );
        }
    }
}
