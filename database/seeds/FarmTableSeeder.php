<?php

use Illuminate\Database\Seeder;
use App\Farm;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Farm::class, 25)->create();
    }
}
