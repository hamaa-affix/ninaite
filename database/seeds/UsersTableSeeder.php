<?php

use Illuminate\Database\Seeder;
use App\User;
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
       factory(User::class)->create();
       
        #簡単ログイン用 ユーザー作成
      User::create([
        'name'           => '山田太郎',
        'email'          => 'test@test',
        'password'       => Hash::make('12345678'),
        'remember_token' => Str::random(10),
        'created_at'     => now(),
        'updated_at'     => now()
      ]);
    }
}
