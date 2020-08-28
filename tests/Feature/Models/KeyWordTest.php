<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Keyword;
use Illuminate\Support\Facades\DB;

class KeyWordTest extends TestCase
{
    use RefreshDatabase;
      
    public function testInsert()
    {
      DB::table('keywords')->insert([
        'value' => '米農家',
      ]);
      
      $keyword = new Keyword;
      $this->assertNotEmpty($keyword->find(1));
    }
}
