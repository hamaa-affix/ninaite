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
        
        DB::table('farms')->insert([
            'id' => 1,
            'name' => 'test',
            'postal_code' => 00000,
            'address1' => 'xxxxxx',
            'address2' => 'xxxxxx',
            'address3' => 'xxxxx',
            'tel' => 0000000,
            'site_url' => 'xxxxx@xxxxx',
            'summary' => 'xxxxxxx',
            'content' => 'xxxxxx',
        ]);
        
         DB::table('recruitments')->insert([
            'farm_id' => 1,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => 'f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        
        $eloquent = Recruitment::find(1);
        $this->assertNotEmpty(
                    $eloquent
                );
        $this->assertNotEmpty(
                $eloquent->farm()->get()
            );
    
    }
}
