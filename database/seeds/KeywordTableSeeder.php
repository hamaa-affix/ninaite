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
        $values = [
            "米農家","みかんの収穫","レモンの出荷作業",
            "ジャガイモの出荷作業","アスパラガスの収穫",
            "白桃の加工作業","ブドウでワイン","玉ねぎ栽培",
            "ベビーリーフの栽培","イチゴ収穫"
        ];
        
        
        foreach($values as $value){
            Keyword::create([
                'value' => $value,
            ]);
        }
    }
}
