<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Farm;
use App\User;

class FarmTest extends TestCase
{
   use RefreshDatabase;
   
    /**
     * A basic feature test example.
     *
     * @return void
     */
     //
    public function testFactoryable()
    {
        $eloquent = app(Farm::class);
        $this->assertEmpty($eloquent->get()); // 初期状態では空であることを確認
        $entity = factory(Farm::class)->create(); // 先程作ったファクトリーでレコード生成
        $this->assertNotEmpty($eloquent->get()); // 再度getしたら中身が空ではないことを確認し、ファクトリ可能であることを保証
    }
    
}
