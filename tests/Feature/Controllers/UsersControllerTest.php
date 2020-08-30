<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\User;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanSeeShow()
    {
        $user = factory(User::class,5)->create();
        $user_id = $user->first()->id;        
        
        $user_data = User::find($user_id);
        
        $response = $this->actingAs(User::find($user_id))->get('/users/' . $user_id);
        $response->assertStatus(200)
                 ->assertSee($user_data->name);
    }
    
    public function testCanEdit()
    {
        $user = factory(User::class,5)->create();
        $user_id = $user->first()->id;        
        
        $user_data = User::find($user_id);
        
        $response = $this->actingAs(User::find($user_id))->get('/users/' . $user_id. '/edit');
        $response->assertStatus(200)
                 ->assertSee($user_data->name);
    }
    
    public function testCanUpdate()
    {
        $this->withoutExceptionHandling();
        $data = [
            'email' => 'test@test'        
        ];
        
        $user = factory(User::class)->create();
        $user_id = $user->first()->id;        
        $user_data = User::find($user_id);
        
        $response = $this->actingAs($user_data);
        //can do that for putMethod and update 
        $response = $this->put(route('users.update', ['user' => $user_data->id]), $data);
        $response = $this->assertDatabaseHas('users', $data);
        
    } 
    
     public function testCanDestroy()
    {
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $user_id = $user->first()->id;        
        $user_data = User::find($user_id);
        
        $response = $this->actingAs($user_data);
        //can do that for putMethod and update 
        $response = $this->delete(route('users.destroy', ['user' => $user_data->id]));
        $response->assertRedirect();
        
        //is not userdata 
        $this->assertDatabaseMissing('users', ['id' => $user_data->id]);
        
    } 
}