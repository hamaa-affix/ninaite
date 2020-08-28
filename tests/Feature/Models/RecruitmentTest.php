<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; 
use App\Recruitment;
use App\Farm;
use Illuminate\Support\Facades\DB;

class RecruitmentTest extends TestCase
{
    use RefreshDatabase;
    
    public function testInsert()
    {
        
        $farm_factory = factory(Farm::class)->create();
        $farm_id =Farm::first()->id;
        DB::table('recruitments')->insert([
            'farm_id' => $farm_id,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        
        $recruitment = Recruitment::first();
        $this->assertNotEmpty($recruitment);
        $this->assertNotEmpty($recruitment->farm()->first());
    
    }
}
