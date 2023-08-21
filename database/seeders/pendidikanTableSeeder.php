<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\cv;
use App\pendidikan;
class pendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cv = cv::find(32);

        $pen = new pendidikan;
        $pen->jenjang = "SD";
        $pen->nama = "Permata Hijau";
        $pen->kota = "Kab. Bandung";
        $pen->mulai = "2020-01-01";
        $pen->mulai = "2026-01-01";
        $pen->mulai = "08";
        $pen->mulai = "2020-01-01.pdf";

        $cv->pendidikans()->save($pen);
    }
}
