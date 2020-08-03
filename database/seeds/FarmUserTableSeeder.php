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
        DB::table('farm_user')->insert([
            'user_id' => 1,
            'farm_id' => 1,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 2,
            'farm_id' => 2,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 3,
            'farm_id' => 3,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 4,
            'farm_id' => 4,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 5,
            'farm_id' => 5,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 6,
            'farm_id' => 6,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 7,
            'farm_id' => 7,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 8,
            'farm_id' => 8,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 9,
            'farm_id' => 9,
        ]);
        DB::table('farm_user')->insert([
            'user_id' => 10,
            'farm_id' => 10,
        ]);
    }
}
