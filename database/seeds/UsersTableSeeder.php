<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //factory(User::class)->create();
        $now = Carbon::now();
        #簡単ログイン用 ユーザー作成
        User::create([
            'id'           => 1,
            'name'         => 'テスト一般user',
            'email'        => 'example@gmail.com',
            'password'     => Hash::make('user'),
            'tel'          => '0848271569',
            'postcode'     => '0630811',
            'pref_id'      => 1,
            'municipality' => '札幌市西区琴似一条',
            'address'      => '18番',
            'building'     => 'ライオンズマンション602号',
            'created_at'   => $now,
            'updated_at'   => $now,
            'deleted_at'   => null
        ]);
    }
}
