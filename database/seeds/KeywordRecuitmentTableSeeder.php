<?php

use Illuminate\Database\Seeder;

class KeywordRecuitmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10
            ];
        
        foreach ($i as $key => $value) {
             DB::table('keyword_recruitment')->insert([
                'keyword_id' => $key,
                'recruitment_id' => $value,
            ]);
        }
        
    }
}
