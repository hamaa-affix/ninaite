<?php

use Illuminate\Database\Seeder;


class FarmUserTableSeeder extends Seeder
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
             DB::table('farm_user')->insert([
                'user_id' => $key,
                'farm_id' => $value,
            ]);
        }
    }
}
