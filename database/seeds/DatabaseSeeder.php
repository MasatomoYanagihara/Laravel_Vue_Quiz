<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AnswerTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        $this->call(QuizTableSeeder::class);
        $this->call(RankingTableDummySeeder::class);
        $this->call(KeywordTableSSeeder::class);
        $this->call(AdminTableSSeeder::class);
    }
}
