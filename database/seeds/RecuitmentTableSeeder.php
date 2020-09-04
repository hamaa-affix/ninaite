<?php

use Illuminate\Database\Seeder;
use App\Recruitment;

class RecuitmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('recruitments')->insert([
            'farm_id' => 1,
            'status' => 1,
            'title' => 'お米の収穫作業、出荷作業',
            'summary' => '米農家を営んでいます。一緒に収穫しませんか',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/f532cb9d19349808c8cdd87cff4b59b8_w.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 2,
            'status' => 1,
            'title' => 'みかんの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'みかんの収穫、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/1455141_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 3,
            'status' => 1,
            'title' => 'レモンの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'レモンの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/3092774_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 4,
            'status' => 1,
            'title' => 'ジャガイモの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'ジャガイモの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/6f60542e48f1c6c60343df42f4453b5a_w.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 5,
            'status' => 1,
            'title' => 'アスパラガスの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'アスパラガスの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/2546105_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 6,
            'status' => 1,
            'title' => '白桃の生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => '白桃の収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/1675339_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 7,
            'status' => 1,
            'title' => 'ブドウの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'ブドウの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/683864_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 8,
            'status' => 1,
            'title' => '人参、玉ねぎの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => '人参、玉ねぎの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/403591_s.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 9,
            'status' => 1,
            'title' => 'ベビーリーフの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'ベビーリーフの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/500_F_277370856_RP8elHc8TckjN8qzfPYFblMmP30HSC1k.jpg'
        ]);
        DB::table('recruitments')->insert([
            'farm_id' => 10,
            'status' => 1,
            'title' => 'イチゴの生産と加工をおこなっています。一緒に収穫しませんか',
            'summary' => 'イチゴの収穫作業、出荷作業',
            'content' => 'XXX県でxxxの生産加工を営んでいます。時給XXX 作業内容：XXXX,期間：XXX',
            'img_name' => '/storage/recruitment_images/mick-haupt-oOQsLhnMHKY-unsplash.jpg'
        ]);
        
    }
}
