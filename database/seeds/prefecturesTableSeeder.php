<?php

use Illuminate\Database\Seeder;

class prefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->truncate();
        DB::table('prefectures')->insert([
            [
                'id'         => 1,
                'pref'      => '東京都',
                'city'      => '新宿区',

            ],
            [
                'id'         => 2,
                'pref'      => '神奈川県',
                'city'      => '横浜市',

            ],
            [
                'id'         => 3,
                'pref'      => '千葉県',
                'city'      => '千葉市',

            ],
            [
                'id'         => 4,
                'pref'      => '埼玉県',
                'city'      => 'さいたま市',

            ],
            [
                'id'         => 5,
                'pref'      => '栃木県',
                'city'      => '宇都宮市',

            ],
            [
                'id'         => 6,
                'pref'      => '群馬県',
                'city'      => '前橋市',

            ],
            [
                'id'         => 7,
                'pref'      => '茨城県',
                'city'      => '水戸市',

            ],
        ]);
    }
}
