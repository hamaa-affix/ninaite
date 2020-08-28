<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\ChatRoom;
use App\ChatMessage;
use Illuminate\Support\Facades\DB;

class ChatMessageTest extends TestCase
{
    use RefreshDatabase;
    
    public function testInsert()
    {
        
        $user = app(User::class);
        $entity = factory(User::class, 5)->create(); // 先程作ったファクトリーでレコード生成
    
        DB::table('chat_rooms')->insert([
                'id' => 1
            ]);
        
        DB::table('chat_messages')->insert([
                'user_id' => 1,
                'chat_room_id' => 1,
                'body' => 'こんにちは'
            ]);
        
        $chat_message = new ChatMessage;
        $this->assertNotEmpty($chat_message->find(1));
    }
}
