<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Farm;
use App\Recruitment;

class RecruitmentControllerTest extends TestCase
{
     use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanSeeIndex()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $farm = factory(Farm::class)->create();
        $farm_id = Farm::first()->id;
        DB::table('recruitments')->insert([
            'farm_id' => $farm_id,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        $recruitment = Recruitment::first()->title;
        
        $response = $this->get(route('recruitments.index'));
        $response->assertStatus(200);
        $response->assertSee($recruitment);
    }
    
    public function testCanSeeShow()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $farm = factory(Farm::class)->create();
        $farm_id = Farm::first()->id;
        DB::table('recruitments')->insert([
            'farm_id' => $farm_id,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        $recruitment = Recruitment::first();
        
        $response = $this->get(route('farms.recruitments.show', ['farm' => $farm_id ,'recruitment' => $recruitment->id]));
        $response->assertStatus(200);
        $response->assertSee($recruitment->title);
    }
    
    // public function testCanUpdate() {
         
    //     $user = factory(User::class)->create();
    //     $this->actingAs($user);
        
    //     $farm = factory(Farm::class)->create();
    //     $farm_id = Farm::first()->id;
    //     DB::table('recruitments')->insert([
    //         'farm_id' => $farm_id,
    //         'status' => 1,
    //         'title' => 'お米の収穫作業、出荷作業',
    //         'summary' => '米農家を営んでいます。一緒に収穫しませんか',
    //         'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
    //         'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
    //     ]);
    //     $recruitment = Recruitment::first();
        
    //      Storage::fake('recruitments');

    //     $file = UploadedFile::fake()->image('test.jpg');
    //     $json = json_encode($file);
         
    //     $recruitment_data = [
    //         'status' => 1,
    //         'title' => 'test',
    //         'summary' => 'test',
    //         'content' => 'test',
    //         'img_name' => null
    //         ];
             
    //     $keyword_data = [
    //         'value' => 'test'
    //         ];
    
    //     $response = $this->put(route('farms.recruitments.update', ['farm' => $farm_id ,'recruitment' => $recruitment->id]), $recruitment_data, $keyword_data)
    //                      ->assertSessionHasNoErrors();
    //     $response = $this->assertDatabaseHas('recruitments', $recruitment_data);
    // }
    
    public function testcanDestroy()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $farm = factory(Farm::class)->create();
        $farm_id = Farm::first()->id;
        DB::table('recruitments')->insert([
            'farm_id' => $farm_id,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        $recruitment = Recruitment::first();
        
        $response = $this->delete(route('farms.recruitments.destroy', ['farm' => $farm_id, 'recruitment' => $recruitment->id]))
                          ->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('recruitments', ['id' => $recruitment->id]);
    }
}
