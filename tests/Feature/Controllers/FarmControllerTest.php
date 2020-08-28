<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Farm;
use App\User;

class FarmControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCnaSeeIndex()
    {
        $farm = factory(Farm::class, 5)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get('farms');
        $response->assertStatus(200);
    }
    
    public function testCanSeeEdit()
    {
        $this->withoutExceptionHandling();
        $farm = factory(Farm::class)
                ->create()
                ->each(function(Farm $farm) {
                    $farm->users()
                         ->saveMany(factory(User::class,rand(0,5))
                         ->make());
        });
        $farm_data = Farm::first();
        $user = $farm_data->users()->first();
        $this->actingAs($user);
        
        
        $response = $this->get(route('farms.edit', ['farm' => $farm_data->id]))
                          ->assertStatus(200);
    }
    
     public function testCanUpdate() 
     {
         
        //$this->withoutExceptionHandling();
        $data = [
                'name' => 'test',
                'postal_code' => '0000000',
                'tel' => '000011111',
                'address1' => 'test',
                'address2' => 'test',
                'address3' => 'test',
                'site_url' => 'http://hogehoge.com',
                'summary'  => 'test'
            ];
        
        $farm = factory(Farm::class)
                ->create()
                ->each(function(Farm $farm) {
                    $farm->users()
                         ->saveMany(factory(User::class,1)
                         ->make());
                });
        $farm_data = Farm::first();
        $user_id = $farm_data->users()->get()->pluck('id');
        $user_data = User::find($user_id->first());
        $this->actingAs($user_data);
        
        //assertSessionHasNoErrorsによってこのアサーションが失敗すると、正確なセッションエラーが表示されます
        $response = $this->put(route('farms.update', ['farm' => $farm_data->id]), $data)
                          ->assertSessionHasNoErrors();
        $response->assertOk();
        $response = $this->assertDatabaseHas('farms', $data);
    }
    
    public function testCanDestroy() {
        $this->withoutExceptionHandling();
        $farm = factory(Farm::class)
                ->create()
                ->each(function(Farm $farm) {
                    $farm->users()
                         ->saveMany(factory(User::class,rand(0,5))
                         ->make());
                });
        $farm_data = Farm::first();
        $user_id = $farm_data->users()->get()->pluck('id');
        $user_data = User::find($user_id->first());
        $this->actingAs($user_data);
        
        $response = $this->delete(route('farms.destroy', ['farm' => $farm_data->id]))
                          ->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('farms', ['id' => $farm_data->id]);
    }
}
