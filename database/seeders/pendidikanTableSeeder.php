<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\cv;
use App\pendidikan;

use Carbon\Carbon;
use Faker\Factory as Faker;
class pendidikanTableSeeder extends Seeder
{
 
    public function run()
    {
        $cv = cv::select("id","nik","tanggal_lahir")->get();
        $faker = Faker::create("id_ID");
        $sekolah = ["SD","SMP","SMA"];
        
        foreach($cv as $item) {
            $today = carbon::create($item->tanggal_lahir);

            // echo $today;
            $val = new pendidikan;
            $val->jenjang = $sekolah[2];
            $val->nama = $faker->streetName;
            $val->kota = $faker->city;
            $val->mulai = $faker->dateTimeInInterval($today,'+ 16 years')->format('Y-m-d');
            $val->selesai = $faker->dateTimeInInterval($today,'+ 19 years')->format('Y-m-d');
            $val->nilai = $faker->numberBetween(70,100);
            $val->file = $item->nik."CV.pdf";
            
            $item->pendidikans()->save($val);
        }
    }
}
