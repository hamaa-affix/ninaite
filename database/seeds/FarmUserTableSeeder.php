<?php

use Illuminate\Database\Seeder;
use App\Models\FarmUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FarmUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        FarmUser::create([
            'id' => 1,
            'name' => 'テスト農場user',
            'email' => 'example@gmail.com',
            'password' => Hash::make('farm'),
            'tel' => '11100001111',
            'postcode' => "250027",
            'pref_id' => 12,
            'municipality' => '松戸市',
            'address' => '18番',
            'building' => 'ライオンズマンション602号',
            'created_at' => $now,
            'updated_at' => $now,
            'deleted_at' => null
        ]);
    }
}
