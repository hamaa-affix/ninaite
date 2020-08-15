<?php

use Illuminate\Database\Seeder;
use App\Keyword;

class KeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('keywords')->insert([
            'value' => '米農家',
        ]);
         DB::table('keywords')->insert([
            'value' => 'みかんの収穫',
        ]);
         DB::table('keywords')->insert([
            'value' => 'レモンの出荷作業',
        ]);
         DB::table('keywords')->insert([
            'value' => 'ジャガイモの出荷作業',
        ]);
         DB::table('keywords')->insert([
            'value' => 'アスパラガスの収穫',
        ]);
         DB::table('keywords')->insert([
            'value' => '白桃の加工作業',
        ]);
         DB::table('keywords')->insert([
            'value' => 'ブドウでワイン',
        ]);
         DB::table('keywords')->insert([
            'value' => '玉ねぎ栽培',
        ]);
         DB::table('keywords')->insert([
            'value' => 'ベビーリーフの栽培',
        ]);
         DB::table('keywords')->insert([
            'value' => 'イチゴ収穫',
        ]);
    }
}
