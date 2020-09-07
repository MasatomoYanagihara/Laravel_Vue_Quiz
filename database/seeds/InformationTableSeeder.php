<?php

use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->truncate(); //テーブルのデータを全て削除するコード

        DB::table('informations')->insert([
          'information' => '最初のお知らせです',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
    }
}
