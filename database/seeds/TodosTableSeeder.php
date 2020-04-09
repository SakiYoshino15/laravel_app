<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; //日付操作のライブラリ　laravelに標準実装

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate();
        DB::table('todos')->insert([
            [
                'user_id'         => 6,
                'title'      => 'Gitテスト',
                'created_at' => Carbon::create(2018, 1, 1),
                'updated_at' => Carbon::create(2018, 1, 4),
            ],
            [
                'user_id'         => 7,
                'title'      => 'Gitの作業フローに慣れる',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
            [
                'user_id'         => 8,
                'title'      => 'git diffコマンドを使いこなす',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
            [
                'user_id'         => 9,
                'title'      => 'Gitの課題に取り組む',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
        ]);
    }
}
